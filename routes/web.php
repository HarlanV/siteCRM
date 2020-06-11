<?php

use Illuminate\Support\Facades\Route;

// Route princial de testes temporários (/teste)
Route::get('/teste','MembersController@membros');
Route::get('/teste/create','MembersController@create');

// Arquivo inicial como gerenciamento do projeto.
Route::get('/','ManageProject@soFar');