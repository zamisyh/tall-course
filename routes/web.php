<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Home;
use App\Http\Livewire\Client\Series;
use App\Http\Livewire\Client\Popular;
use App\Http\Livewire\Client\Topics;
use App\Http\Livewire\Client\Auth\Signin;
use App\Http\Livewire\Client\Auth\Signup;
use App\Http\Livewire\Tes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('client.')->group(function() {
    Route::get('/', Home::class)->name('home');
    Route::get('series', Series::class)->name('series');
    Route::get('topics', Topics::class)->name('topics');
    Route::get('popular', Popular::class)->name('popular');

    Route::prefix('auth')->group(function () {
        Route::name('auth.')->group(function() {
            Route::get('signin', Signin::class)->name('signin');
            Route::get('signup', Signup::class)->name('signup');
        });
    });
});

Route::get('tes', Tes::class);
