<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class AdminAuthor extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin-author')->extends('layouts.app')->section('content');
    }
}
