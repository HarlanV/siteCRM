<?php

use Illuminate\Support\Facades\Route;

// Routes para Membros
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


// Routes para Clientes 

    // Exibe lista de clientes
    Route::get('/client','ClientController@clients')
    ->name('list_clients');

    // Inserir novos clientes - Formulario
    Route::get('/client/create','ClientController@newClient')
    ->name('form_create_client');

    // Persiste cliente - POST RETURN
    Route::post('/client/create', 'ClientController@store')
    ->name('save_client');
    
    // Apaga cliente 
    Route::delete('/client/{id}', 'ClientController@destroy')
    ->name('delete_client');
    
    // Exibe lista de contatos do Cliente 
    Route::get('/client/{id}/register', 'ClientController@clientRegister')
    ->name('list_registers');

    // Edita registro do Cliente - Formulario
    Route::get("/client/{id}/edit/{id_contact}", 'ClientController@clientEditForm')
    ->name('edit_client_form');

    // Persiste alterações de clientes
    Route::post("/client/{id}/edit/{id_contact}", 'ClientController@clientEdit')
    ->name('edit_client_save');

    // Inserir novos registros - Formulario 
    Route::get("/client/{id}/addRegister/", 'ClientController@newRegisterForm')
    ->name('register_form');
   
    // Inserir novos registros - armazenamento
    Route::post("/client/{id}/addRegister/", 'ClientController@storeRegister')
    ->name('save_register');

    // Apaga registro 
    Route::delete('/register/{id}/{register_Id}', 'ClientController@registerDestroy')
    ->name('delete_register');

    // Index e gerenciamento de projeto(temporario) .
    Route::get('/manager','ManageProject@soFar');
    Route::get('/','index@mainView');
