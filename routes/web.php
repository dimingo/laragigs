<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\listing;
use Illuminate\Foundation\Console\AboutCommand;
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


// all listings 
Route::get('/',[ListingController::class, 'index']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
  
// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');     
// show create listing
Route::get('listing/create',  [ListingController::class, 'create'])->middleware('auth');

// store listing
Route::post('listings', [ListingController::class, 'store'])->middleware('auth');

// single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');






// User Registration
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// User logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Create new User
Route::post('/users', [UserController::class,  'store']);

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//  login
Route::post('/users/authenticate', [UserController::class, 'Authenticate'])->name('Authenticate');







