<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $faq_id;

    public function deleteRecord($faq_id)
    {
        $this->faq_id = $faq_id;
    }

    public function destroyRecord()
    { 
        if(is_null($this->user) || !$this->user->can('FAQ.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any FAQ.');
        }

        $faq =  Faq::find($this->faq_id);
        $faq->is_delete = '0';
        $faq->update();
        return redirect('admin/faq')->with('message','FAQ Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $faqs = Faq::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($faqs->perPage() * ($faqs->currentPage() - 1)) + 1;
        return view('livewire.admin.faq.index', compact('faqs', 'serialNo'));
    }
}
