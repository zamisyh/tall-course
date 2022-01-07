<?php

namespace App\Http\Livewire;

use App\Models\Series;
use Livewire\Component;

class ShowCourse extends Component
{

    public $data_series, $slug;

    public function mount($id, $slug)
    {
        $this->slug = $slug;

        $this->data_series = Series::where('id', $id)
            ->with(['episode' => function ($q) {
                $q->where('title_slug', $this->slug);
            }])
            ->first();
        dd($this->data_series);

    }

    public function render()
    {
        return view('livewire.show-course')->extends('layouts.app')->section('content');
    }
}
