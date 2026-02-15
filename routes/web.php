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
    Route::delete('/personagem/delete/{id}', [PersonagemController::class, 'destroy'])->name('delete.personagem');

    // MAGIA
    Route::get('/personagem/{id}/{tab}/magia/criar', [PersonagemController::class, 'createMagia'])->name('magia.create');
    Route::post('/personagem/{id}/{tab}/magia/criar', [PersonagemController::class, 'storeMagia'])->name('magia.store');
    Route::get('/personagem/{id}/{tab}/magia/edit', [PersonagemController::class, 'editMagia'])->name('magia.edit');
    Route::put('/personagem/{id}/{tab}/magia/edit', [PersonagemController::class, 'updateMagia'])->name('magia.update');
    Route::delete('/personagem/{id}/{tab}/magia/update', [PersonagemController::class, 'destroyMagia'])->name('magia.delete');

    //ITEM
    Route::get('/personagem/{id}/{tab}/item/criar', [PersonagemController::class, 'createItem'])->name('item.create');
    Route::post('/personagem/{id}/{tab}/item/criar', [PersonagemController::class, 'storeItem'])->name('item.store');
    Route::get('/personagem/{id}/{tab}/item/edit', [PersonagemController::class, 'editItem'])->name('item.edit');
    Route::put('/personagem/{id}/{tab}/item/update', [PersonagemController::class, 'updateItem'])->name('item.update');
    Route::delete('/personagem/{id}/{tab}/item/delete', [PersonagemController::class, 'destroyItem'])->name('item.delete');

    //ATAQUE
    Route::get('/personagem/{id}/{tab}/ataque/criar', [PersonagemController::class, 'createAtaque'])->name('ataque.create');
    Route::post('/personagem/{id}/{tab}/ataque/criar', [PersonagemController::class, 'storeAtaque'])->name('ataque.store');
    Route::get('/personagem/{id}/{tab}/ataque/edit', [PersonagemController::class, 'editAtaque'])->name('ataque.edit');
    Route::put('/personagem/{id}/{tab}/ataque/update', [PersonagemController::class, 'updateAtaque'])->name('ataque.update');
    Route::delete('/personagem/{id}/{tab}/ataque/delete', [PersonagemController::class, 'destroyAtaque'])->name('ataque.delete');

    //FOTO
    Route::get('/personagem/{id}/foto/edit', [PersonagemController::class,'editFoto'])->name('foto.edit');
    Route::put('/personagem/{id}/foto/update',[PersonagemController::class,'updateFoto'])->name('foto.update');
    });
