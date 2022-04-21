<?php

use App\Http\Controllers\Admin\AparaturDesaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\CategoryBeritaController;
use App\Http\Controllers\Admin\CategoryLapakDesaController;
use App\Http\Controllers\Admin\InfoDesaController;
use App\Http\Controllers\Admin\LapakDesaController;
use App\Http\Controllers\Admin\ProyekDesaController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LapakDesaController as ControllersLapakDesaController;
use App\Http\Controllers\ProyekDesaController as ControllersProyekDesaController;
use App\Models\CategoryLapakDesa;
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


Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('/about',[HomeController::class, 'about']);
Route::get('/pengaduan',[HomeController::class, 'pengaduan'])->name('pengaduan-home');
Route::post('/pengaduan',[HomeController::class, 'storePengaduan'])->name('submit-pengaduan-home');

Route::get('/aparatur-desa',[HomeController::class, 'aparatur'])->name('aparatur-desa');

Route::get('/profile-wilayah-desa',[HomeController::class, 'profileWilayah'])->name('profile-wilayah');
Route::get('/sejarah-desa',[HomeController::class, 'sejarahDesa'])->name('sejarah-desa');

Route::get('/visi-misi',[HomeController::class, 'visiMisi'])->name('visi-misi');
Route::get('/struktur-desa',[HomeController::class, 'strukturDesa'])->name('struktur-desa');


Route::get('/berita',[BeritaController::class, 'index']);
Route::get('/berita/{post:slug}',[BeritaController::class, 'show'])->name('detail-berita-home');

Route::get('/lapak-desa',[ControllersLapakDesaController::class, 'index'])->name('lapak-desa-home');
Route::get('/lapak-desa/{lapak:slug}',[ControllersLapakDesaController::class, 'show'])->name('detail-lapak');

Route::get('/proyek-desa',[ControllersProyekDesaController::class, 'index'])->name('proyek-desa-home');
Route::get('/proyek-desa/{proyek:slug}',[ControllersProyekDesaController::class, 'show'])->name('detail-proyek');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'authenticate']);

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register',[AuthController::class, 'store']);

Route::post('/logout',[AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class, 'index'])->name('admin');
        Route::get('/pengaduan',[AdminController::class, 'pengaduan'])->name('pengaduan');
        Route::post('/pengaduan/{post:id}',[AdminController::class, 'updatePengaduan'])->name('updatePengaduan');
        
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
            Route::put('/edit/{post:slug}',[AdminBeritaController::class, 'update'])->name('update-berita');
            Route::delete('/destroy/{post:slug}',[AdminBeritaController::class, 'destroy'])->name('hapus-berita');
        });
        Route::resource('proyek-desa', ProyekDesaController::class);
        Route::resource('lapak-desa', LapakDesaController::class);
        Route::resource('category-lapak', CategoryLapakDesaController::class);
    });
});

