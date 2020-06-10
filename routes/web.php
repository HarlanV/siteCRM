<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route de testes temporários
Route::get('/teste','MembersController@membros');
Route::get('/teste/create','MembersController@create');

// Arquivo inicial como gerenciamento do projeto. A ser excluido depois
Route::get('/','ManageProject@soFar');