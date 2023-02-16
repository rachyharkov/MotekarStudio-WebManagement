<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class ContactSetting extends Component
{

    public $contacts;

    protected $listeners = [
        'saveContact'
    ];

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function render()
    {
        return view('livewire.admin.contact-setting');
    }

    public function saveContact($data)
    {
        // dd($data);

        Contact::truncate();

        foreach ($data as $key => $value) {
            Contact::create([
                'id' => $value['urutan'],
                'type' => $value['type'],
                'value' => $value['value'],
                'created_at' => now()
            ]);
        }

        $this->contacts = Contact::all();

        $this->emit('contactSaved', ['message' => 'Contact information has been saved!']);
    }
}
