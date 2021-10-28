<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PodcastController;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
    $user = User::where('roleid','=','2')->get();
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/carica', function() {
    $mess = null;
    return view('carica', compact('mess'));
})->middleware('can:podcaster')->name('carica');

Route::post('/carica', [PodcastController::class, 'carica']);
Route::get('/profile/{id}', [PodcastController::class, 'show']);
Route::put("/profile/{id}", [PodcastController::class, 'update']);
Route::delete("/profile/{fileid}", [PodcastController::class, 'destroy']);
Route::post('/download', function(Request $request){
    // dd($request->input('path'));
    $path = $request->input('path');
    return Storage::disk('public')->download($path);
});



