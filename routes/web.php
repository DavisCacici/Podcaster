<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PodcastController;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/carica', function() {
    return view('carica');
})->middleware('can:podcaster')->name('carica');

Route::post('/carica', [PodcastController::class, 'carica'])->name('carica');
Route::view('/profile/{id}', 'profile')->name('profile');
Route::get('/user/{id}', [PodcastController::class, 'view'])->name('user');
Route::get('image', function(){
    return Storage::disk('public')->get('profile-photos/N29NAvksLYrSwlgGyUr6V6VHoDUwxscB6PyiDXBq.png');
});


