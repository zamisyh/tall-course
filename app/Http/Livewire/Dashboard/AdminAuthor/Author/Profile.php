<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Author;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\File;

class Profile extends Component
{

    use WithFileUploads;

    public $name, $about, $work, $image, $dataAuthor, $img;



    public function mount()
    {
        $this->dataAuthor = Author::where('user_id', Auth::user()->id)->first();
        if (!is_null($this->dataAuthor)) {
           $this->name = $this->dataAuthor->name;
           $this->work = $this->dataAuthor->work;
           $this->about = $this->dataAuthor->about;
           $this->image = $this->dataAuthor->image;
        }

        // Author::where('user_id', Auth::user()->id)->delete();
    }

    public function render()
    {

        return view('livewire.dashboard.admin-author.author.profile')->extends('layouts.app')->section('content');
    }

    public function updatedImg()
    {
        $this->validate([
            'img' => 'file|mimes:png,jpg,jpeg,webp|max:1024'
        ]);
    }

    public function updateProfile()
    {
        $newImage = null;
        $this->validate([
            'name' => 'required',
            'work' => 'required',
            'about' => 'required',
            'img' => 'required'
        ]);

        try {


            if (is_null($this->img)) {
                $newImage = $this->img = $this->image;

            }else{
                $newImage = Str::slug(strtolower($this->name)). '-' . time(). '.' . $this->img->getClientOriginalExtension();
                File::delete(public_path('storage/images/author/profile/' . $this->image));
                $this->img->storeAs('public/images/author/profile', $newImage);
            }


            Author::updateOrCreate(
                [ 'user_id' => Auth::user()->id ],
                [
                    'name' => $this->name,
                    'about' => $this->about,
                    'work' => $this->work,
                    'image' => $newImage
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
