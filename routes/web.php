<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PlatlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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
    return view('auth.login');
});

Route::get('/home',[HomeController::class,'home'])->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::match(['get','post'],'/regester',[AuthController::class, 'register'])->name('register')->middleware('guest');;
Route::match(['get','post'],'/login',[AuthController::class, 'login'])->name('login')->middleware('guest');;
Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');;

Route::post('profile.update/{user}',[ProfilController::class,'editProfile'])->name('profile.update')->middleware('auth');;

Route::resource('plats',PlatlController::class)->except(['index',])->middleware('auth');;

