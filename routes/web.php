<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonagemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');


Route::post('login', [AuthController::class,'login']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[PersonagemController::class, 'index'])->name('dashboard');



});