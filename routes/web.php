<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Livewire\EditProfile;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/tweets');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::get('/profiles/{user:username}/edit2', EditProfile::class);
    Route::patch('/profiles/{user:username}', [ProfileController::class, 'update'])->name('profiles.update');

    Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
});
