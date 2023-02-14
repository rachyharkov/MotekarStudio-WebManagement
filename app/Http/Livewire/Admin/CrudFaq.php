<?php

namespace App\Http\Livewire\Admin;

use App\Models\Faq;
use Livewire\Component;

class CrudFaq extends Component
{
    public $faqs;

    protected $listeners = ['faqSaveAll'];

    public function mount()
    {
        $this->faqs = Faq::all();
    }

    public function render()
    {
        return view('livewire.admin.crud-faq');
    }

    public function faqSaveAll($faqs)
    {
        // dd($faqs);
        Faq::truncate();
        foreach ($faqs as $faq) {
            Faq::create([
                'id' => $faq['id'],
                'question' => trim($faq['question']),
                'answer' => trim($faq['answer']),
            ]);
        }
        $this->faqs = Faq::all();
        $this->emit('faqSaved');
    }
}
