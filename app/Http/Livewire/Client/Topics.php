<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Topics extends Component
{
    public function render()
    {
        return view('livewire.client.topics')->extends('layouts.app')->section('content');
    }
}
