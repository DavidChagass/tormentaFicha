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
    
    // MAGIA
    Route::get('/personagem/{id}/magia/criar',[PersonagemController::class, 'createMagia'])->name('magia.create');
    Route::post('/personagem/{id}/magia/criar',[PersonagemController::class, 'storeMagia'])->name('magia.store');
    Route::get('/personagem/{id}/magia/edit',[PersonagemController::class, 'editMagia'])->name('magia.edit');
    Route::put('/personagem/{id}/magia/edit',[PersonagemController::class,'updateMagia'])->name('magia.update');
    Route::delete('/personagem/{id}/magia/update', [PersonagemController::class, 'destroyMagia'])->name('magia.delete');

    //ATAQUE



    //ITEM
    Route::get('/personagem/{id}/item/criar',[PersonagemController::class, 'createItem'])->name('item.create');
    Route::post('/personagem/{id}/item/criar',[PersonagemController::class, 'storeItem'])->name('item.store');
    Route::get('/personagem/{id}/item/edit',[PersonagemController::class, 'editItem'])->name('item.edit');
    Route::put('/personagem/{id}/item/update',[PersonagemController::class, 'updateItem'])->name('item.update');
    Route::delete('/personagem/{id}/item/delete',[PersonagemController::class, 'destroyItem'])->name('item.delete');
});
