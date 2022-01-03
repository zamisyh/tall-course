<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{

    public $old_password, $new_password, $confirm_password, $user_id, $pass;
    public $show_password;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->pass = User::where('id', $this->user_id)->pluck('password');
    }

    public function render()
    {
        return view('livewire.dashboard.settings')->extends('layouts.app')->section('content');
    }

    public function updatePassword($id)
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

       if (Hash::check($this->old_password, $this->pass[0])) {
            User::where('id', $id)->update([
                'password' => bcrypt($this->new_password)
            ]);

            $this->alert(
                'success',
                'Password succesfully update'
            );

            $this->clear();

       }else{
            $this->alert(
                'error',
                'Oopps, wrong old password'
            );
       }
    }

    public function clear()
    {
        $this->new_password = '';
        $this->old_password = '';
        $this->confirm_password = '';
    }
}
