<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
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
    return view('dashboard',['x'=>'']);
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


Route::post('/add/service', [ServiceController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/list/service',[ServiceController::class, 'getServiceAll'])->middleware(['auth', 'verified']);
Route::post('/editar/service', [ServiceController::class, 'getService'])->middleware(['auth', 'verified']);
Route::post('/update/service', [ServiceController::class, 'updateService'])->middleware(['auth', 'verified']);
Route::post('/deletar/service', [ServiceController::class, 'deleteService'])->middleware(['auth', 'verified']);
Route::post('/search/service',[ServiceController::class, 'searchService'])->middleware(['auth', 'verified']);

Route::post('/add/portfolio', [PortfolioController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/list/portfolio',[PortfolioController::class, 'getPortfolioAll'])->middleware(['auth', 'verified']);
Route::post('/editar/portfolio', [PortfolioController::class, 'getPortfolio'])->middleware(['auth', 'verified']);
Route::post('/update/portfolio', [PortfolioController::class, 'updatePortfolio'])->middleware(['auth', 'verified']);
Route::post('/deletar/portfolio', [PortfolioController::class, 'deletePortfolio'])->middleware(['auth', 'verified']);
Route::post('/search/portfolio',[PortfolioController::class, 'searchPortfolio'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
