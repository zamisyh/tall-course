<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Author;
use App\Models\User;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Navbar extends Component
{

    public $isLogout, $profileImage;

    public function mount()
    {
        $this->profileImage = Author::where('user_id', Auth::user()->id)->pluck('image');
    }

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
