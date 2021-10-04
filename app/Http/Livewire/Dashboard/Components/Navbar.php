<?php

namespace App\Http\Livewire\Dashboard\Components;

use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{

    public $isLogout;

    public function render()
    {
        return view('livewire.dashboard.components.navbar');
    }

    public function logout()
    {
        $this->isLogout = true;
        redirect()->route('client.home');

    }
}
