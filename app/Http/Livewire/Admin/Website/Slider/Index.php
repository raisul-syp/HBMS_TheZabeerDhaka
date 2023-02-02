<?php

namespace App\Http\Livewire\Admin\Website\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Website\Slider;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $slider_id;

    public function deleteRecord($slider_id)
    {
        $this->slider_id = $slider_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.Sliders.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Slider of Website.');
        }

        $sliders =  Slider::find($this->slider_id);
        $sliders->is_delete = '0';
        $sliders->update();

        return redirect('admin/website/sliders')->with('message','Slider Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $sliders = Slider::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($sliders->perPage() * ($sliders->currentPage() - 1)) + 1;
        return view('livewire.admin.website.slider.index', compact('sliders', 'serialNo'));
    }
}
