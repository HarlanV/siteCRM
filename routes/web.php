<?php

use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Route;

// Route princial de testes temporários (/teste)
Route::get('/membro','MembersController@membros');
Route::get('/membro/create','MembersController@create');
Route::post('/membro/create', 'MembersController@store');

// Arquivo inicial como gerenciamento do projeto.
Route::get('/','ManageProject@soFar');
