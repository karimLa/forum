<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::post('/threads', [ThreadController::class, 'store'])->name('store_thread');
    Route::get('/threads/create', [ThreadController::class, 'create'])->name('create_thread');
    Route::delete('/threads/{channel:slug}/{thread}', [ThreadController::class, 'destroy']);
    Route::post('/threads/{channel:slug}/{thread}/replies', [ReplyController::class, 'store'])->name('store_reply');
    Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);
});

Route::get('/threads', [ThreadController::class, 'index'])->name('threads');
Route::get('/threads/{channel:slug}', [ThreadController::class, 'index']);
Route::get('/threads/{channel:slug}/{thread}', [ThreadController::class, 'show'])->name('thread');
Route::get('/profile/{user:name}', [ProfilesController::class, 'show'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
