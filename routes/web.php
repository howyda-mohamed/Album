<?php

use App\Http\Controllers\Dashboard\AlbumController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImageController;
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
const PAGINATION_COUNT='10';
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'user'],function()
{
    Route::get('/',[HomeController::class,'index'])->name('user.dashboard');
    Route::get('/albums/{id}',[HomeController::class,'Get_album'])->name('user.albums');
    Route::group(['prefix'=>'album'],function(){
        Route::get('/albums',[AlbumController::class,'index'])->name('Get_Album');
        Route::get('/create',[AlbumController::class,'create'])->name('Album.create');
        Route::post('/store',[AlbumController::class,'store'])->name('Album.store');
        Route::get('/edit/{id}',[AlbumController::class,'edit'])->name('Album.edit');
        Route::post('/update/{id}',[AlbumController::class,'update'])->name('Album.update');
        Route::get('/delete/{id}',[AlbumController::class,'delete'])->name('Album.delete');
        Route::get('/change/{id}',[AlbumController::class,'change'])->name('Album.change');
        Route::post('/move/{id}',[AlbumController::class,'move'])->name('Album.move');
    });
    Route::group(['prefix'=>'image'],function(){
        Route::get('/images',[ImageController::class,'index'])->name('Get_Image');
        Route::get('/create',[ImageController::class,'create'])->name('Image.create');
        Route::post('/store',[ImageController::class,'store'])->name('Image.store');
        Route::get('/edit/{id}',[ImageController::class,'edit'])->name('Image.edit');
        Route::post('/update/{id}',[ImageController::class,'update'])->name('Image.update');
        Route::get('/delete/{id}',[ImageController::class,'delete'])->name('Image.delete');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
