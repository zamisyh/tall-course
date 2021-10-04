<?php

namespace App\Http\Livewire\Components\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.components.client.navbar');
    }

    public function logout()
    {
        Auth::logout();

        $this->alert('success', 'Succesfully logout', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
    ]);
    }
}
