<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;

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

Route::get('/', [AlbumsController::class, 'index'])->name('home');
Route::get('/albums', [AlbumsController::class, 'index'])->name('home');
Route::get('/albums/create', [AlbumsController::class, 'create'])->name('create');
Route::post('/albums/store', [AlbumsController::class, 'store'])->name('store');
Route::get('/albums/show/{id}', [AlbumsController::class, 'show'])->name('show');
Route::get('/albums/delete/{id}', [AlbumsController::class, 'destroy'])->name('destroy');


Route::get('/photos/create/{album_id}', [PhotosController::class, 'create'])->name('photos.create');
Route::post('/photos/store', [PhotosController::class, 'store'])->name('photos.store');
Route::get('/photos/show/{id}', [PhotosController::class, 'show'])->name('photos.show');
Route::get('/photos/delete/{id}', [PhotosController::class, 'destroy'])->name('photos.destroy');

