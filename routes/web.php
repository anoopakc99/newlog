<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/dashboard',[LoginController::class,'dashboard']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/form',[HomeController::class,'index']);
Route::post('store',[HomeController::class,'store']);

Route::get('/form/edit/{id}', [HomeController::class,'edit']);
Route::post('/form/update/{id}', [HomeController::class,'update']);
Route::get('form.destroy/{id}', [HomeController::class,'delete']);
