<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\emprestimoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\membroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/Autor', [AutorController::class, 'store']);

Route::get('/Autores', [AutorController::class, 'index']);

Route::post('/Livro', [LivroController::class, 'store']);

Route::get('/livros', [LivroController::class, 'index']);

Route::post('/Membro', [membroController::class, 'store']);

Route::get('/Membro', [membroController::class, 'index']);

Route::post('/emprestimo', [emprestimoController::class, 'store']);

Route::get('/emprestimo', [emprestimoController::class, 'index']);
    