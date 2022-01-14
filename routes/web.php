<?php

use App\Http\Livewire\ShowTweets;
use App\Http\Livewire\User\UploadPhoto;
use Illuminate\Support\Facades\Route;

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

Route::get('upload', UploadPhoto::class)->middleware('auth', 'verified')->name('upload.photo.user');
Route::get('tweets', ShowTweets::class)->middleware('auth', 'verified')->name('tweets.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
