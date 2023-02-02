<?php

namespace App\Http\Livewire\Admin\Website\Page;

use Livewire\Component;
use App\Models\Website\Page;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user;
    public $page_id;

    public function deleteRecord($page_id)
    {
        $this->page_id = $page_id;
    }

    public function destroyRecord()
    {
        if(is_null($this->user) || !$this->user->can('Website.Pages.Delete')) {
            abort(403, 'Sorry! You do not have permission to delete any Page of Website.');
        }

        $pages =  Page::find($this->page_id);
        $pages->is_delete = '0';
        $pages->update();

        return redirect('admin/website/pages')->with('message','Page Has Been Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $pages = Page::where('is_delete','1')->orderBy('created_at','DESC')->paginate(10);
        $serialNo = ($pages->perPage() * ($pages->currentPage() - 1)) + 1;
        return view('livewire.admin.website.page.index', compact('pages', 'serialNo'));
    }
}
