<?php

use App\Http\Controllers\Admin\AparaturDesaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\CategoryBeritaController;
use App\Http\Controllers\Admin\InfoDesaController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;

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


Route::get('/',[HomeController::class, 'home']);
Route::get('/about',[HomeController::class, 'about']);
Route::get('/coba',[HomeController::class, 'date']);



Route::get('/berita',[BeritaController::class, 'index']);
Route::get('/berita/{slug}',[BeritaController::class, 'show']);

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'authenticate']);

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'store']);

Route::post('/logout',[AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class, 'index'])->name('admin');
        
        Route::prefix('info-desa')->group(function(){
            Route::resource('aparatur', AparaturDesaController::class);
            Route::get('/identitas-desa',[InfoDesaController::class, 'identitasDesa'])->name('identitas-desa');
            Route::post('/identitas-desa',[InfoDesaController::class, 'storeIdentitas'])->name('simpan-identitas');
            Route::get('/pemerintahan-desa',[InfoDesaController::class, 'pemerintahanDesa'])->name('pemerintahan-desa');
            Route::post('/pemerintahan-desa',[InfoDesaController::class, 'storePemerintahan'])->name('simpan-pemerintahan');
    
        });

        Route::prefix('berita')->group(function(){
            Route::get('/',[AdminBeritaController::class, 'index'])->name('berita');
            Route::get('/add',[AdminBeritaController::class, 'create'])->name('add-berita');
            Route::get('/tes',[AdminBeritaController::class, 'tes'])->name('tes-berita');
            Route::post('/upload',[AdminBeritaController::class, 'upload'])->name('uplod');
            
            // Route::post('/tes',[AdminBeritaController::class, 'create'])->name('save-berita');
            Route::post('/add',[AdminBeritaController::class, 'store'])->name('simpan-berita');
            Route::get('/category/checkSlug', [CategoryBeritaController::class, 'checkSlug']);
            Route::resource('category', CategoryBeritaController::class);
            // Route::get('/kategori/tambah',[CategoryBeritaController::class, 'create'])->name('tambah-kategori');
            // Route::post('/kategori/tambah',[CategoryBeritaController::class, 'store'])->name('simpan-kategori');
            // Route::get('/kategori/edit/{post:slug}',[CategoryBeritaController::class, 'edit'])->name('edit-kategori');
            // Route::post('/kategori/edit',[CategoryBeritaController::class, 'update'])->name('simpan-edit-kategori');
            Route::get('/{post:slug}',[AdminBeritaController::class, 'show'])->name('detail-berita');
            Route::get('/edit/{post:slug}',[AdminBeritaController::class, 'edit'])->name('edit-berita');
            Route::post('/edit/{post:slug}',[AdminBeritaController::class, 'update'])->name('update-berita');
            Route::delete('/destroy/{post:slug}',[AdminBeritaController::class, 'destroy'])->name('hapus-berita');
        });
    });
});

