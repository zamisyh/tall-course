<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin-author.home')->extends('layouts.app')->section('content');
    }
}
