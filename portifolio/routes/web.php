<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\SignatureController;

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Foreach_;

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
    return view('dashboard',['x'=>'', 'port'=>PortfolioController::getPort()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('about', AboutController::class);
    Route::post('/search/about',[AboutController::class, 'searchAbout']);
    Route::resource('service', ServiceController::class);
    Route::post('/search/service',[ServiceController::class, 'searchService']);
    Route::resource('testimonials', TestimonialsController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::post('/search/portfolio',[PortfolioController::class, 'searchPortfolio']);
    Route::resource('signature', SignatureController::class);
    
    
});



//testemonials
Route::post('/add/testimonials', [TestimonialsController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/list/testimonials',[TestimonialsController::class, 'getTestimonialsAll'])->middleware(['auth', 'verified']);
Route::post('/editar/testimonials', [TestimonialsController::class, 'getTestimonials'])->middleware(['auth', 'verified']);
Route::post('/update/testimonials', [TestimonialsController::class, 'updateTestimonials'])->middleware(['auth', 'verified']);
Route::post('/deletar/testimonials', [TestimonialsController::class, 'deleteTestimonials'])->middleware(['auth', 'verified']);
Route::post('/search/testimonials',[TestimonialsController::class, 'searchTestimonials'])->middleware(['auth', 'verified']);
// Signature
Route::post('/add/signature', [SignatureController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/list/signature',[SignatureController::class, 'getSignatureAll'])->middleware(['auth', 'verified']);
Route::post('/editar/signature', [SignatureController::class, 'getSignature'])->middleware(['auth', 'verified']);
Route::post('/update/signature', [SignatureController::class, 'updateSignature'])->middleware(['auth', 'verified']);
Route::post('/deletar/signature', [SignatureController::class, 'deleteSignature'])->middleware(['auth', 'verified']);
Route::post('/search/signature',[SignatureController::class, 'searchSignature'])->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
