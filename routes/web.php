<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class,'index'])->name('article-list');
Route::get('/article/create',[ArticleController::class,'create'])->name('article-create');
Route::get('/article/edit/{article}',[ArticleController::class,'edit'])->name('article-edit');
Route::put('/article/update/{article}',[ArticleController::class,'update']);
Route::delete('/article/delete/{article}',[ArticleController::class,'destroy']);
Route::post('/article',[ArticleController::class, 'store']);
Route::get('/article/{article}', [ArticleController::class,'show'])->name('article');
