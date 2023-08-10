<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//! HOME CONTROLLER
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/annuncio/{nome}/{id}', [HomeController::class, 'show'])->name('homeDettaglio');

//! USER CONTROLLER
Route::get('/profilo/annunci', [UserController::class, 'index'])->name('userHome')->middleware(['auth']);
Route::get('/articolo/aggiungi', [UserController::class, 'create'])->name('userCreate')->middleware(['auth']);
Route::post('/articolo/aggiungi', [UserController::class, 'store'])->name('userCreateStore')->middleware(['auth']);
Route::delete('/articolo/elimina/{id}', [UserController::class, 'destroy'])->name('userDeleteArticle')->middleware(['auth']);
Route::get('/articolo/modifica/{id}', [UserController::class, 'edit'])->name('userEdit')->middleware(['auth']);
Route::put('/articolo/modifica/{id}', [UserController::class, 'update'])->name('userEditSubmit')->middleware(['auth']);

//! TAGS CONTROLLER
Route::get('/tags-home', [TagController::class, 'index'])->name('tagsHome')->middleware(['auth']);
Route::get('/tags-create', [TagController::class, 'create'])->name('tagsCreate')->middleware(['auth']);
Route::post('/tags-create', [TagController::class, 'store'])->name('tagsStore')->middleware(['auth']);
Route::get('/tags-edit/{id}', [TagController::class, 'edit'])->name('tagsEdit')->middleware(['auth']);
Route::put('/tags-edit/{id}', [TagController::class, 'update'])->name('tagsUpdate')->middleware(['auth']);
Route::delete('/tags-delete/{id}', [TagController::class, 'destroy'])->name('tagsDelete')->middleware(['auth']);