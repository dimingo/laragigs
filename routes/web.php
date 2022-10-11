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

// single listing

// Rote Model Binding
Route::get('/listing/{listing}', [ListingController::class, 'show']);
