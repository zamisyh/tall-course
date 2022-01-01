<?php

namespace App\Http\Livewire\Dashboard\AdminAuthor\Author;

use App\Models\Author;
use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\File;


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
    public $userIdDelete, $closeModal, $authorId, $seriesId;


    public function mount()
    {
        $this->authorId = Author::where('user_id', Auth::user()->id)->pluck('id');

    }


    public function render()
    {
        $data = null;

        if ($this->search) {
            $data['data']['course'] = Series::where('title', 'LIKE', '%' . ucwords(strtolower($this->search)) . '%')
                            ->where('author_id', $this->authorId[0])
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->rows);
        }else{
           $data['data']['course']=  Series::where('author_id', $this->authorId[0])
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->rows);
        }
        return view('livewire.dashboard.admin-author.author.course', $data)->extends('layouts.app')
            ->section('content');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'file|mimes:png,jpg,jpeg,webp|max:1024'
        ]);
    }

    public function saveSeries()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
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
                    'author_id' => $this->authorId[0],
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

    public function removeSeries($id)
    {
        $this->confirm('Are you sure delete this series?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);

        $this->seriesId = $id;
    }

    public function confirmed()
    {


        $data = Series::findOrFail($this->seriesId);

        $path = public_path('storage/images/course/thumbnail/' . $data->image);
        File::exists($path) ? File::delete($path) : '';
        $data->delete();

        $this->alert(
            'success',
            'Series deleted'
        );
    }

    public function editSeries($id)
    {
        dd(true);
    }

}
