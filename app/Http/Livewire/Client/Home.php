<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.client.home')->extends('layouts.app')->section('content');
    }
}
