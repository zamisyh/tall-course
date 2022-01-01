<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Author;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\User;

class Profile extends Component
{

    use WithFileUploads;

    public $name, $about, $work, $image, $dataAuthor;


    public function mount()
    {
        $this->dataAuthor = Author::where('user_id', Auth::user()->id)->first();
        if (!is_null($this->dataAuthor)) {
           $this->name = $this->dataAuthor->name;
           $this->work = $this->dataAuthor->work;
           $this->about = $this->dataAuthor->about;
           $this->image = $this->dataAuthor->image;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.admin-author.author.profile')->extends('layouts.app')->section('content');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'file|mimes:png,jpg,jpeg,webp|max:1024'
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'work' => 'required',
            'about' => 'required',
            'image' => 'required'
        ]);
        try {
            $nameFile = Str::slug(strtolower($this->name)). '-' . time(). '.' . $this->image->getClientOriginalExtension();
            $path = 'public/images/author/profile';

            $this->image->storeAs($path, $nameFile);

            $author = Author::updateOrCreate(
                [ 'user_id' => Auth::user()->id ],
                [
                    'name' => $this->name,
                    'about' => $this->about,
                    'work' => $this->work,
                    'image' => $nameFile
                ]
            );

            User::where('id', Auth::user()->id)->update(['status' => true]);

        $this->alert(
            'success',
            'Succesfully update your profile'
        );

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
