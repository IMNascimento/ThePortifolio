<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard',['x'=>'teste']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/add/about', [AboutController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/list/about',[AboutController::class, 'getAboutAll'])->middleware(['auth', 'verified']);
Route::post('/editar/about', [AboutController::class, 'getAbout'])->middleware(['auth', 'verified']);
Route::post('/update/about', [AboutController::class, 'updateAbout'])->middleware(['auth', 'verified']);
Route::post('/deletar/about', [AboutController::class, 'deleteAbout'])->middleware(['auth', 'verified']);
Route::post('/search/about',[AboutController::class, 'searchAbout'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
