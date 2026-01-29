<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonagemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PersonagemController::class, 'index'])->name('dashboard');

    Route::get('/personagem/criar', [PersonagemController::class, 'create'])->name('personagem.create');
    Route::post('/personagem/criar', [PersonagemController::class, 'store'])->name('personagem.store');
    Route::get('/personagem/{id}', [PersonagemController::class, 'show'])->name('personagem.show');
    Route::delete('/personagem/delete/{id}',[PersonagemController::class,'destroy'])->name('delete.personagem');
    
    Route::get('/personagem/{id}/magia/criar',[PersonagemController::class, 'magiaCreate'])->name('magia.create');

    Route::post('/personagem/{id}/magia/criar',[PersonagemController::class, 'storeMagia'])->name('magia.store');
    Route::get('/personagem/{id}/magia/edit',[PersonagemController::class, 'editMagia'])->name('magia.edit');
    Route::put('/personagem/{id}/magia/edit',[PersonagemController::class,'updateMagia'])->name('magia.update');
    Route::delete('/personagem/{id}/magia/update', [PersonagemController::class, 'destroyMagia'])->name('magia.delete');
});
