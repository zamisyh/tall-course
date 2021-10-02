<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tes extends Component
{
    public function render()
    {
        return view('livewire.tes')->extends('layouts.app')->section('content');
    }

    public function testing()
    {
        dd('work');
    }
}
