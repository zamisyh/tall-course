<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Series extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function episode()
    {
        return $this->hasMany(Episode::class);
    }

    //

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
