<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\emprestimoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\membroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/Autor', [AutorController::class, 'store']);
Route::get('/Autor/find/{id}', [AutorController::class, 'show']);
Route::put('/Autor', [AutorController::class, 'update']);
Route::delete('/Autor/delete/{id}', [AutorController::class, 'delete']);
Route::get('/Autores', [AutorController::class, 'index']);


Route::post('/Livro', [LivroController::class, 'store']);
Route::get('/Livro/find/{id}', [LivroController::class, 'show']);
Route::put('/Livro', [LivroController::class, 'update']);
Route::delete('/Livro/delete/{id}', [LivroController::class, 'delete']);
Route::get('/livros', [LivroController::class, 'index']);

Route::post('/Membro', [membroController::class, 'store']);
Route::get('/Membro/find/{id}', [membroController::class, 'show']);
Route::put('/Membro', [membroController::class, 'update']);
Route::delete('/Membro/delete/{id}', [membroController::class, 'delete']);
Route::get('/Membro', [membroController::class, 'index']);

Route::post('/emprestimo', [emprestimoController::class, 'store']);
Route::get('/emprestimo/find/{id}', [membroController::class, 'show']);
Route::put('/emprestimo', [membroController::class, 'update']);
Route::delete('/emprestimo/delete/{id}', [membroController::class, 'delete']);
Route::get('/emprestimo', [emprestimoController::class, 'index']);


    