<?php

namespace App\Http\Livewire\Admin;

use App\Models\Portofolio;
use Livewire\Component;

class CrudPortofolio extends Component
{
    public $page, $titlenya;
    public $id_portofolio, $portofolio_title, $portofolio_content, $portofolio_service, $portofolio_foto_sampul, $portofolio_link, $portofolio_status, $created_at, $updated_at, $action, $method;
    public $portofolios;

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
        return view('livewire.admin.crud-portofolio');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'Portofolio List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'Data berhasil dihapus']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New Portofolio';
            $this->action = route('admin.portofolio.store');
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit Portofolio';
            $this->action = route('admin.portofolio.update', $this->id);
            $dataPortofolio = Portofolio::find($id);
            foreach($dataPortofolio->getAttributes() as $key => $value) {
                $this->$key = $value;
            }
            $this->id_portofolio = $id;
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }
    }

    public function cleanForm()
    {
        $this->id_portofolio = null;
        $this->portofolio_title = null;
        $this->portofolio_content = null;
        $this->portofolio_service = null;
        $this->portofolio_foto_sampul = null;
        $this->portofolio_link = null;
        $this->portofolio_status = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
}
