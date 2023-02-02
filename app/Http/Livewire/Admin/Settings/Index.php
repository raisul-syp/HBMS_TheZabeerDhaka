<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Settings;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $settings_id;

    public function deleteRecord($settings_id)
    {
        $this->settings_id = $settings_id;
    }

    public function destroyRecord()
    { 
        if(is_null($this->user) || !$this->user->can('Settings.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Settings.');
        }

        $settings =  Settings::find($this->settings_id);
        $settings->is_delete = '0';
        $settings->update();
        return redirect('admin/settings')->with('message','Settings Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function render()
    {
        $settings = Settings::where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($settings->perPage() * ($settings->currentPage() - 1)) + 1;
        return view('livewire.admin.settings.index', compact('settings', 'serialNo'));
    }
}
