<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myFirstController;
use App\Models\studentsdata;
use App\Http\Controllers\yajraDatatablesController;
use App\Http\Controllers\profileController;

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

Route::get('/hello/{name?}',[myFirstController::class,'helloUser']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('/profile','profile');

Route::redirect('/home','/profile');

Route::get('/profile',[profileController::class,'show']);

Route::get ( '/usingdatatables', function () {
    $data = studentsdata::all ();
    return view ( 'usingdatatables' )->withData ( $data );
} );

Route::get('/usingyajradatatables', [yajraDatatablesController::class, 'index']);
