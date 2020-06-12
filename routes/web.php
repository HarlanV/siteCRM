<?php

use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Route;

/** Route princial de Membros */

    // Listagem de membros
    Route::get('/membro','MembersController@membros');
    // Formulario Criar membros
    Route::get('/membro/create','MembersController@create');
    // Persiste membro
    Route::post('/membro/create', 'MembersController@store');
    // Apaga membro
    Route::delete('/membro/{id}', 'MembersController@destroy');


// Arquivo inicial como gerenciamento do projeto.
Route::get('/','ManageProject@soFar');
