<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class Author extends Component
{

    use WithPagination;
    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'confirmed',
        'canceled'
    ];


    public $isSaved, $rows = 5, $search;
    public $name, $email, $role, $password, $confirm_password;
    public $userIdDelete, $closeModal;



    public function render()
    {

        $data = null;


        if ($this->search) {
            $data['data']['dataUser'] =  User::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->rows);

        }else{
            $data['data']['dataUser'] =  User::orderBy('created_at', 'DESC')->paginate($this->rows);

        }

        $data['data']['getRole'] = Role::orderBy('created_at', 'DESC')->get();

        return view('livewire.dashboard.admin-author.admin.author', $data)->extends('layouts.app')
            ->section('content');
    }

    public function saveAuthor()
    {
        $this->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name',
            'confirm_password' => 'required|same:password|min:6'
        ]);

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            $user->assignRole($this->role);

            $this->alert('success', 'Succesfully create user', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);


            redirect()->route('dashboard.admin.author');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->role = $data->roles->first()->id;

    }

    public function update($id)
    {
        $data = User::findOrFail($id);

        $data->name = $this->name;
        $data->email = $this->email;
        $data->update();


        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $data->assignRole($this->role);


        $this->closeModal = true;

        $this->alert(
            'success',
            'Succesfully update user'
        );
    }

    public function delete($id)
    {
        $this->triggerConfirm();
        $this->userIdDelete = $id;
    }

    public function triggerConfirm()
    {
        $this->confirm('Are you sure delete this data?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {

        User::find($this->userIdDelete)->delete();

        $this->alert(
            'success',
            'User deleted'
        );
    }
}
