<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Home;
use App\Http\Livewire\Client\Series;
use App\Http\Livewire\Client\Popular;
use App\Http\Livewire\Client\Topics;
use App\Http\Livewire\Client\Auth\Signin;
use App\Http\Livewire\Client\Auth\Signup;
use App\Http\Livewire\Dashboard\AdminAuthor\Home as HomeAdmin;
use App\Http\Livewire\Dashboard\Users\Home as HomeUser;
use App\Http\Livewire\Dashboard\AdminAuthor\Admin\Author;
use App\Http\Livewire\Dashboard\AdminAuthor\Author\Course;
use App\Http\Livewire\Dashboard\AdminAuthor\Author\Profile;
use App\Http\Livewire\Dashboard\Settings;
use App\Http\Livewire\ShowCourse;
use Iman\Streamer\VideoStreamer;


use App\Http\Livewire\Tes;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

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
    Route::get('course/vidio/{id}/{slug}', ShowCourse::class)->name('get-vidio');

    Route::prefix('auth')->group(function () {
        Route::name('auth.')->group(function() {
            Route::get('signin', Signin::class)->name('signin');
            Route::get('signup', Signup::class)->name('signup');
        });
    });
});

Route::prefix('dashboard')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('dashboard.admin.')->group(function() {
            Route::middleware(['role:admin|author'])->group(function () {
                Route::get('/', HomeAdmin::class)->name('home');
            });

            Route::middleware(['role:admin'])->group(function () {
                Route::get('author', Author::class)->name('author');
            });

            Route::middleware(['role:author'])->group(function () {
                Route::get('course', Course::class)->name('author.course');
                Route::get('profile', Profile::class)->name('author.profile');
            });
        });
    });

    Route::get('settings', Settings::class)->name('dashboard.settings');


    Route::middleware(['role:user'])->group(function () {
        Route::prefix('user')->group(function () {
            Route::name('dashboard.user.')->group(function() {
                Route::get('/', HomeUser::class)->name('home');
            });
        });
    });

});

