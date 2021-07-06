<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\inventoriesController;

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
    return view('home');
});

Route::get('/invoice', [inventoriesController::class, 'search']);

Route::get('/additem', function () {
    return view('add');
});

Route::post('/additem', [inventoriesController::class, 'store']);

Route::get('/search', [inventoriesController::class, 'search']);

Route::get('/entry', [inventoriesController::class, 'entries']);

Route::post('/entry', [inventoriesController::class, 'entries']);

Route::get('/preferences', function () {
    return view('preferences');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
