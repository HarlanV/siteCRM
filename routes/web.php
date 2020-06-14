<?php

use Illuminate\Support\Facades\Route;

/** Routes para Membros */

    // Listagem de membros
    Route::get('/member','MemberController@members')
    ->name('list_members');

    // Formulario Criar membros
    Route::get('/member/create','MemberController@list')
    ->name('form_create_member');

    // Persiste membro
    Route::post('/member/create', 'MemberController@store');
    
    // Apaga membro
    Route::delete('/member/{id}', 'MemberController@destroy');


/** Route para Clientes */

    // Listagem de clientes
    Route::get('/client','ClientController@clients')
    ->name('list_clients');

    // Formulario para inserir clientes
    Route::get('/client/create','ClientController@list')
    ->name('form_create_client');

    // Persiste cliente
    Route::post('/client/create', 'ClientController@store');
    
    // Apaga cliente
    Route::delete('/client/{id}', 'ClientController@destroy');
    
    // Lista contatos do Cliente
    Route::get('client/{sector}/contacts', 'ContactController@index');

// Index e gerenciamento de projeto(temporario) .
Route::get('/manager','ManageProject@soFar');
Route::get('/','index@mainView');
