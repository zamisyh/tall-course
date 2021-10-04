<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.dashboard.users.home')->extends('layouts.app')->section('content');
    }
}
