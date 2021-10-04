<?php

namespace App\Http\Livewire\Client\Auth;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Signup extends Component
{

    public $name, $email, $password, $confirm_password;

    public function render()
    {
        return view('livewire.client.auth.signup')->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            $user->assignRole('user');
            $this->reset();

            $this->alert('success', 'Succesfully created user', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
          ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
