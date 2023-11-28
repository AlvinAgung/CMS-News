<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VillageOfficerController;
use App\Models\Category;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('kategori-berita', CategoryController::class);
    Route::resource('berita', NewsController::class);
    Route::resource('acara', AcaraController::class);
    Route::resource('video', VideoController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('perangkat-desa', VillageOfficerController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);

});

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('news', [LandingController::class, 'news'])->name('landing.news');
Route::get('list-video', [LandingController::class, 'video'])->name('landing.video');
Route::get('list-perangkat-desa', [LandingController::class, 'perangkat_desa'])->name('landing.perangkat-desa');
Route::get('news/{slug}', [LandingController::class, 'newsdetail'])->name('landing.news-detail');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('action-login', [AuthController::class, 'actionLogin'])->name('action-login');
Route::get('register', [AuthController::class, 'register'])->name('register');
