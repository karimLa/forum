<?php

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
    Route::post('/threads/{channel:slug}/{thread}/replies', [ReplyController::class, 'store'])->name('create_reply');
});

Route::get('/threads', [ThreadController::class, 'index'])->name('threads');
Route::get('/threads/{channel:slug}', [ThreadController::class, 'index']);
Route::get('/threads/{channel:slug}/{thread}', [ThreadController::class, 'show'])->name('thread');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
