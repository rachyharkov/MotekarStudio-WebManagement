<?php

namespace App\Http\Livewire\Admin;

use App\Models\SocialMedia;
use Livewire\Component;

class CrudSocialmedia extends Component
{
    public $page, $titlenya;
    public $id_social_media, $social_media_name, $social_media_icon, $social_media_url, $social_media_clicks, $social_media_status, $created_at, $updated_at, $action, $method;
    public $socialmedias;

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
        return view('livewire.admin.crud-socialmedia');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'socialmedia List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'Data berhasil dihapus']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New socialmedia';
            $this->action = route('admin.social_media.store');
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit socialmedia';
            $this->action = route('admin.social_media.update', $this->id);
            $datasocialmedia = SocialMedia::find($id);
            foreach($datasocialmedia->getAttributes() as $key => $value) {
                $this->$key = $value;
            }
            $this->id_social_media = $id;
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }
    }

    public function cleanForm()
    {
        $this->id_social_media = null;
        $this->social_media_name = null;
        $this->social_media_icon = null;
        $this->social_media_url = null;
        $this->social_media_clicks = null;
        $this->social_media_status = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
}
