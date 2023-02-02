<?php

namespace App\Http\Livewire\Admin\Website\Testimonial;

use App\Models\Website\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $testimonial_id;

    public function deleteRecord($testimonial_id)
    {
        $this->testimonial_id = $testimonial_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.Testimonials.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Testimonial of Website.');
        }

        $testimonials =  Testimonial::find($this->testimonial_id);
        $testimonials->is_delete = '0';
        $testimonials->update();

        return redirect('admin/website/testimonials')->with('message','Testimonial Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $testimonials = Testimonial::where('is_active','1')->where('is_delete','1')->orderBy('id','ASC')->paginate(10);
        $serialNo = ($testimonials->perPage() * ($testimonials->currentPage() - 1)) + 1;
        return view('livewire.admin.website.testimonial.index', compact('testimonials', 'serialNo'));
    }
}
