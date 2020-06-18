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

    // Exibe lista de clientes
    Route::get('/client','ClientController@clients')
    ->name('list_clients');

    // Inserir novos clientes - Formulario
    Route::get('/client/create','ClientController@newClient')
    ->name('form_create_client');

    // Persiste cliente - POST RETURN
    Route::post('/client/create', 'ClientController@store');
    
    // Apaga cliente 
    Route::delete('/client/{id}', 'ClientController@destroy');
    
    // Exibe lista de contatos do Cliente 
    Route::get('/client/{id}/contacts', 'ClientController@clientRegister');

    // Edita contatos do Cliente - Formulario
    Route::get("/client/{id}/edit/{id_contact}", 'ClientController@clientEditForm');

    // ESTA ROUTE ESTÁ EM CONSTRUÇÃO. Persiste alterações de clientes
    Route::post("/client/{id}/edit/{id_contact}", 'ClientController@clientEditStore');

    // ESTA ROUTE ESTÁ EM CONSTRUÇÃO. Route para inserir novos CONTATOS em determinado cliente
    Route::get("/client/{id}/addContact/", 'ClientController@addNewContact');

// Index e gerenciamento de projeto(temporario) .
Route::get('/manager','ManageProject@soFar');
Route::get('/','index@mainView');
