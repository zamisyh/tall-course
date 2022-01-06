<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Author\Components;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;

class AddSection extends Component
{
    public $isOpenFormAddSection, $data_section, $data_series, $form_add_new_section, $authorId, $seriesId;

    protected $listeners = [
        'emitSaveSection'
    ];

    public function render()
    {
        return view('livewire.dashboard.admin-author.author.components.add-section')->extends('layout.app')->section('content');
    }

    public function saveSection()
    {
        $this->validate([
            'form_add_new_section' => 'required|unique:sections,name'
        ]);

        try {
            Section::create([
                'author_id' => $this->authorId,
                'series_id' => $this->seriesId,
                'name' => ucwords(strtolower($this->form_add_new_section))
            ]);

            $this->alert(
                'success',
                'Succesfully update series'
            );


            $this->emit('sectionAdded');
            $this->reset('form_add_new_section');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


}
