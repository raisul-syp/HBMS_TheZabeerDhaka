<?php

namespace App\Http\Livewire\Admin\Website\ContactInfo;

use App\Models\Website\ContactInfo;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $contacts_id;

    public function deleteRecord($contacts_id)
    {
        $this->contacts_id = $contacts_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.ContactInfos.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Contact Info of Website.');
        }

        $contacts =  ContactInfo::find($this->contacts_id);
        $contacts->is_delete = '0';
        $contacts->update();

        return redirect('admin/website/contactinfo')->with('message','Facility Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $contacts = ContactInfo::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($contacts->perPage() * ($contacts->currentPage() - 1)) + 1;
        return view('livewire.admin.website.contact-info.index', compact('contacts', 'serialNo'));
    }
}
