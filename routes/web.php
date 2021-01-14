<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    // Route::post('/profiles/{user:username}', [ProfileController::class, 'store'])->name('profiles.store');
    Route::patch('/profiles/{user:username}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::post('/profiles/{user:username}/follow', [FollowController::class, 'store'])->name('profiles.follow');
    Route::post('/profiles/{user:username}/unfollow', [FollowController::class, 'destroy'])->name('profiles.unfollow');

    Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
});

