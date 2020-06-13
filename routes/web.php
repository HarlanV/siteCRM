<?php

use Illuminate\Support\Facades\Route;

/** Routes para Membros */

    // Listagem de membros
    Route::get('/membro','MembersController@membros')
    ->name('list_members');

    // Formulario Criar membros
    Route::get('/membro/create','MembersController@create')
    ->name('form_create_member');
    // Persiste membro
    Route::post('/membro/create', 'MembersController@store');
    // Apaga membro
    Route::delete('/membro/{id}', 'MembersController@destroy');


/** Route para Clientes */

    // Listagem de clientes
    Route::get('/cliente','ClientsController@clientes')
    ->name('list_clients');

    // Formulario para inserir clientes
    Route::get('/cliente/create','ClientsController@create')
    ->name('form_create_client');
    // Persiste cliente
    Route::post('/cliente/create', 'ClientsController@store');
    // Apaga cliente
    Route::delete('/cliente/{id}', 'ClientsController@destroy');
    // Lista contatos do Cliente
    Route::get('cliente/{id}/contatos', 'ContactsController@index');



// Arquivo inicial como gerenciamento do projeto.
Route::get('/manager','ManageProject@soFar');
Route::get('/','index@mainView');
