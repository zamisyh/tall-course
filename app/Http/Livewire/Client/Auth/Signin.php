<?php

namespace App\Http\Livewire\Client\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Signin extends Component
{

    public $email, $password;

    public function render()
    {
        return view('livewire.client.auth.signin')->extends('layouts.app')->section('content');
    }

    public function signin()
    {
        $this->validate([
            'email' => 'required|email|min:4',
            'password' => 'required|min:6'
        ]);

        try {

           if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $this->alert('success', 'Succesfully login', [
                        'position' =>  'top-end',
                        'timer' =>  3000,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                ]);
           }else{
                $this->alert('error', 'Invalid your credential', [
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


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
