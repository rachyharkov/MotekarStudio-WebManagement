<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class CrudService extends Component
{
    public $page, $titlenya;
    public $id_service, $service_title, $service_short_description, $service_content, $service_icon, $service_status, $service_views, $created_at, $updated_at, $action, $method;
    public $services;

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
        return view('livewire.admin.crud-service');
    }

    public function setPage($page, $id = null)
    {
        if($page == 'index') {
            $this->page = 'index';
            $this->titlenya = 'service List';
            $this->dispatchBrowserEvent('initTableNya', ['message' => 'Data berhasil dihapus']);
            $this->cleanForm();
        }
        if($page == 'create') {
            $this->page = 'create';
            $this->titlenya = 'Add New service';
            $this->action = route('admin.service.store');
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }

        if($page == 'edit') {
            $this->page = 'edit';
            $this->titlenya = 'Edit service';
            $this->action = route('admin.service.update', $this->id);
            $dataservice = Service::find($id);
            foreach($dataservice->getAttributes() as $key => $value) {
                $this->$key = $value;
            }
            $this->id_service = $id;
            $this->method = 'POST';
            $this->dispatchBrowserEvent('formScript');
        }
    }

    public function cleanForm()
    {
        $this->id_service = null;
        $this->service_title = null;
        $this->service_short_description = null;
        $this->service_content = null;
        $this->service_icon = null;
        $this->service_status = null;
        $this->service_views = null;
        $this->created_at = null;
        $this->updated_at = null;
    }
}
