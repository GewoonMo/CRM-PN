<?php

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// github login
Route::get('sign-in/github', [App\Http\Controllers\Auth\LoginController::class, 'github'])->name('sign-in.github');
Route::get('sign-in/github/redirect', [App\Http\Controllers\Auth\LoginController::class, 'githubRedirect']);

// google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'google'])->name('login.google');
Route::get('sign-in/google/redirect', [App\Http\Controllers\Auth\LoginController::class, 'googleRedirect']);

// Crud all profielen
Route::get('all/profile', [App\Http\Controllers\ProfileController::class, 'all'])->name('profile.all');
Route::get('/profile/show', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/showProfile', [App\Http\Controllers\ProfileController::class, 'showProfile'])->name('profile.showProfile');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{profile}/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{profile}/delete', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

// Create a new profile
Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');

// Create profile for a new user
Route::get('/profiles/createForUser/{user}', [App\Http\Controllers\ProfileController::class, 'createForUser'])->name('profile.createForUser');
Route::get('/profiles/noProfile', [App\Http\Controllers\ProfileController::class, 'showNoProfile'])->name('profile.noProfile');
Route::post('/profiles/storeForUser/{user}', [App\Http\Controllers\ProfileController::class, 'storeForUser'])->name('profile.storeForUser');
Route::get('/profiles/{user}/edit', [App\Http\Controllers\ProfileController::class, 'editForUser'])->name('profile.editForUser');
Route::put('/profiles/{user}/update', [App\Http\Controllers\ProfileController::class, 'updateForUser'])->name('profile.updateForUser');
Route::delete('/profiles/{user}/delete', [App\Http\Controllers\ProfileController::class, 'destroyForUser'])->name('profile.destroyForUser');

// Crud for klanten
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'all'])->name('customers.all');
Route::get('/customers/{customer}/show', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');

// Crud for producten
//Route::get('/producten', [App\Http\Controllers\ProductController::class, 'index'])->name('producten.index');
//Route::get('/producten/create', [App\Http\Controllers\ProductController::class, 'create'])->name('producten.create');
//Route::post('/producten', [App\Http\Controllers\ProductController::class, 'store'])->name('producten.store');
//Route::get('/producten/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('producten.edit');
//Route::put('/producten/{product}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('producten.update');
//Route::delete('/producten/{product}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('producten.destroy');

// Crud for bestellingen
//Route::get('/bestellingen', [App\Http\Controllers\OrderController::class, 'index'])->name('bestellingen.index');
//Route::get('/bestellingen/create', [App\Http\Controllers\OrderController::class, 'create'])->name('bestellingen.create');
//Route::post('/bestellingen', [App\Http\Controllers\OrderController::class, 'store'])->name('bestellingen.store');
//Route::get('/bestellingen/{bestelling}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('bestellingen.edit');
//Route::put('/bestellingen/{bestelling}/update', [App\Http\Controllers\OrderController::class, 'update'])->name('bestellingen.update');
//Route::delete('/bestellingen/{bestelling}/delete', [App\Http\Controllers\OrderController::class, 'destroy'])->name('bestellingen.destroy');





