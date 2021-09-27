<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Popular extends Component
{
    public function render()
    {
        return view('livewire.client.popular')->extends('layouts.app')->section('content');
    }
}
