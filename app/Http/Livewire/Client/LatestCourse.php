<?php

namespace App\Http\Livewire\Client;

use App\Models\Section;
use Livewire\Component;
use App\Models\Series;

class LatestCourse extends Component
{

    public $data_series, $sectionCount;

    public function mount()
    {
        $this->data_series = Series::latest()->with('author', 'episode')->get();
    }

    public function render()
    {
        return view('livewire.client.latest-course');
    }
}
