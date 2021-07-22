<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LihatController;
use App\Http\Controllers\LihatnewsController;



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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'home'])->name('beranda');
Route::get('/news_event', [HomeController::class, 'news'])->name('news_event');
Route::get('/about', [HomeController::class, 'aboutus'])->name('about');
Route::get('/galeri', [HomeController::class, 'galeris'])->name('galeri');

Route::resource('customer', CustomerController::class)->middleware("role:petugas|admin");
Route::resource('petugas', PetugasController::class)->middleware("role:admin");
Route::resource('posts', PostController::class)->middleware("role:petugas|admin");
Route::resource('news', NewsController::class)->middleware("role:petugas|admin");
Route::resource('galeris', GaleriController::class)->middleware("role:petugas|admin");
Route::resource('users', UserController::class)->middleware("role:admin");
Route::resource('lihat', LihatController::class);
Route::resource('lihatnews', LihatnewsController::class);