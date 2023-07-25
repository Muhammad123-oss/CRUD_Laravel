<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');// It shows the content of 'Welcome' page on Web Browser. This page is created inside 'view' folder
//     return env('DB_DATABASE'); // It shows the value of 'DB_DATABASE' env variable value on Web Browser
// });

// Route::get('/contactUs',function(){
//     return view('contactUs');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//A PROJECT
Route::resource('/cars',CarsController::class);//Remember in "resources" controller we have to pass controller as a string instead as an Array.Means there is no [] with controller arg.

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
