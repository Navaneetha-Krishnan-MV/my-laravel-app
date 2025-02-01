<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Laravel\Telescope\Telescope;






// Route::get('/', function () {
//     return view('welcome');
// });



use App\Http\Controllers\FormController;

// Route to display the form
Route::get('/form', [FormController::class, 'showForm']);

Route::post('/submit-form', [FormController::class, 'submitForm'])->name('submit.form');



Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');





Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/image-generator', [ImageController::class, 'index'])->name('image.index')->middleware('auth');
    Route::post('/generate', [ImageController::class, 'generateImage'])->name('image.generate');
});

Auth::routes();  // This auto-generates all the routes for login, register, logout, etc.
