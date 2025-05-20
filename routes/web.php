<?php

use App\Livewire\GeminiChat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PlatformController;


Route::get('/', [PublicController::class, 'homepage'])->name('home');
Route::get('/create', [PublicController::class, 'create'])->name('create');
Route::post('/store', [PublicController::class, 'store'])->name('store');
Route::get('/index', [PublicController::class, 'index'])->name('index');
Route::get('/movies/show/{movie}', [PublicController::class, 'show'])->name('movies.show');
Route::get('/movies/edit/{movie}', [PublicController::class, 'edit'])->name('movie.edit');
Route::put('/movies/update/{movie}', [PublicController::class, 'update'])->name('movie.update');
Route::delete('/movies/destroy/{movie}', [PublicController::class, 'delete'])->name('movie.delete');
Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
// rotte piattaforme
Route::get('/platform/index', [PlatformController::class, 'index'])->name('platform.index');
Route::get('/platform/create', [PlatformController::class, 'create'])->name('platform.create');
Route::post('/platform/store', [PlatformController::class, 'store'])->name('platform.store');
Route::get('/platform/show/{platform}', [PlatformController::class, 'show'])->name('platform.show');
Route::get('/movies/{movie}/platforms/edit', [PlatformController::class, 'editMoviePlatforms'])->name('movies.platforms.edit');
Route::post('/movies/{movie}/platforms', [PlatformController::class, 'updateMoviePlatforms'])->name('movies.platforms.update');
Route::view('/chat', 'chat')->name('chat.gemini');


// Logica del CRUD (Create, Read, Update, Delete)
// Create: Creare un nuovo film
// Read: Leggere i film esistenti
// Update: Aggiornare un film esistente
// Delete: Eliminare un film esistente