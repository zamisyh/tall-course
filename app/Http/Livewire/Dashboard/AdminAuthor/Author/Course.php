<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Author;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Course extends Component
{

    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'confirmed',
        'canceled'
    ];

    public $isSaved, $rows = 5, $search;
    public $title, $description, $image;
    public $userIdDelete, $closeModal;



    public function render()
    {
        $data = null;

        if ($this->search) {
            $data['data']['course'] = Series::where('title', 'LIKE', '%' . $this->search . '%')
                            ->where('author_id', Auth::user()->id)
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->rows);
        }else{
           $data['data']['course']=  Series::where('author_id', Auth::user()->id)
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->rows);
        }

        return view('livewire.dashboard.admin-author.author.course', $data)->extends('layouts.app')
            ->section('content');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|file|mimes:png,jpg,jpeg,webp|max:1024'
        ]);
    }

    public function saveSeries()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {

            if (Auth::user()->status == false) {
                $this->alert('error', 'Lengkapi profile anda terlebih dahulu', [
                    'position' =>  'center',
                    'timer' =>  3000,
                    'toast' =>  false,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }else{
                $namaFile = strtolower(Str::slug($this->title)). '-' . time(). '.'. $this->image->getClientOriginalExtension();
                $path = 'public/images/course/thumbnail';

                $this->image->storeAs($path, $namaFile);

                Series::create([
                    'title' => ucwords(strtolower($this->title)),
                    'description' => $this->description,
                    'author_id' => Auth::user()->id,
                    'slug' => Str::slug(strtolower($this->title)),
                    'image' => $namaFile
                ]);

                $this->alert(
                    'success',
                    'Succesfully create course'
                );
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
