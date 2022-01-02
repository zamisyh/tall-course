<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminAuthor extends Component
{

    public $old_password, $new_password, $confirm_password, $user_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        dd($this->user_id);
    }

    public function render()
    {
        return view('livewire.dashboard.admin-author')->extends('layouts.app')->section('content');
    }


}
