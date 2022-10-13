<?php

use App\Http\Controllers\ListingController;
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
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);     
// show create listing
Route::get('listing/create',  [ListingController::class, 'create']);

// store listing
Route::post('listings', [ListingController::class, 'store']);

// single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);



