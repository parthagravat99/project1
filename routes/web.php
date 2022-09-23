<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myFirstController;
use App\Http\Controllers\yajraDatatablesController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\datatablesController;
use App\Http\Controllers\SendEmailController;


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

Route::redirect('/home','/profile');

Route::get('/profile',[profileController::class,'show']);

Route::get ( '/usingdatatables',[datatablesController::class,'showDatatables']);

Route::get('/usingyajradatatables', [yajraDatatablesController::class, 'index']);

Route::get('/deletetabledata', [yajraDatatablesController::class, 'destroy']);

Route::get('send-email', [SendEmailController::class, 'index']);

Route::get('/deletedataemail', [SendEmailController::class, 'deleteDataEmail']);
