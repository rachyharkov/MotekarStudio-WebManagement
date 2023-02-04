<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;

class CrudPost extends Component
{
    public $page, $titlenya;
    public $id_post, $post_categories, $post_title, $post_content, $post_status, $post_category, $post_author, $post_views, $tags, $foto_sampul, $created_at, $updated_at, $action, $method;
    public $posts;

    protected $listeners = [
        'setPage'
    ];

    public function mount()
    {
        $this->dispatchBrowserEvent('initDatatable');
        $this->setPage('index');
    }

    public function render()
    {
        return view('livewire.admin.crud-post');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'post List';
            $this->post_categories = PostCategory::all();
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'Data berhasil dihapus']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New post';
            $this->action = route('admin.post.store');
            $this->method = 'POST';
            $this->post_categories = PostCategory::all();
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit post';
            $this->action = route('admin.post.update', $this->id);
            $dataPost = Post::find($id);
            foreach($dataPost->getAttributes() as $key => $value) {
                $this->$key = $value;
            }
            $this->id_post = $id;
            $this->method = 'POST';
            $this->post_categories = PostCategory::all();
            $this->dispatchBrowserEvent('formScript');
        }
    }

    public function cleanForm()
    {
        $this->post_title = '';
        $this->post_content = '';
        $this->post_status = '';
        $this->post_category = '';
        $this->post_author = '';
        $this->post_views = '';
        $this->tags = '';
        $this->foto_sampul = '';
        $this->created_at = '';
        $this->updated_at = '';
    }
}
