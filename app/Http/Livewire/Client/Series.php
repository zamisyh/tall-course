<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Series extends Component
{
    public function render()
    {
        return view('livewire.client.series')->extends('layouts.app')->section('content');
    }
}
