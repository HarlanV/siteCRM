<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* POST */

 // Persiste membro
 Route::post('/member/create', 'MemberController@store');
    
 // Persiste cliente - POST RETURN
 Route::post('/client/create', 'ClientController@store')
 ->name('save_client')
 ->middleware('LoginDirector');

 // Inserir novos registros - armazenamento
 Route::post("/client/{id}/addRegister/", 'ClientController@storeRegister')
 ->name('save_register')
 ->middleware('LoginDirector');

 // Persiste alterações de clientes
 Route::post("/client/{id}/edit/{id_contact}", 'ClientController@clientEdit')
 ->name('edit_client_save')
 ->middleware('LoginDirector');

/* DELETE */

 // Apaga membro
 Route::delete('/member/{id}', 'MemberController@destroy');

 // Apaga cliente 
 Route::delete('/client/{id}', 'ClientController@destroy')
 ->name('delete_client')
 ->middleware('LoginDirector');

 // Apaga registro 
 Route::delete('/register/{id}/{register_Id}', 'ClientController@registerDestroy')
 ->name('delete_register')
 ->middleware('LoginDirector');

/* MEMBERS GET */

 // Listagem de membros
 Route::get('/member','MemberController@members')
 ->name('list_members');

 // Formulario Criar membros
 Route::get('/member/create','MemberController@list')
 ->name('form_create_member')
 ->middleware('LoginDirector');

/* CLIENTS GET */
    
 // Exibe lista de clientes
 Route::get('/client','ClientController@clients')
 ->name('list_clients');

 // Inserir novos clientes - Formulario
 Route::get('/client/create','ClientController@createClient')
 ->name('form_create_client')
 ->middleware('LoginDirector');

 // Exibe lista de registros do Cliente 
 Route::get('/client/{id}/register', 'ClientController@clientRegister')
 ->name('list_registers');

 // Edita registro do Cliente - Formulario
 Route::get("/client/{id}/edit/{id_contact}", 'ClientController@clientEditForm')
 ->name('edit_client_form')
 ->middleware('LoginDirector');
 
 // Inserir novos registros - Formulario 
 Route::get("/client/{id}/addRegister/", 'ClientController@newRegisterForm')
 ->name('register_form')
 ->middleware('LoginDirector');

 // Exibir registro selecionado
 Route::get("/client/{id}/view/{id_contact}", 'ClientController@registerView')
 ->name('view_register');

 
 
/* ACESS AND SUPORT */
 // Index e gerenciamento de projeto(temporario) .
 Route::get('/manager','ManageProject@soFar');
 Route::get('/','index@mainView');


/* EM DESENVOLVIMENTO */
 // Login
 Route::get('/login','LoginController@acessForm')->name('login');
 Route::post('/login','LoginController@login');
 Route::get('/register','RegisterController@create')->name('create_user');
 Route::post('/register','RegisterController@store')->name('store_user');
 Route::get('/logout',function(){
     Auth::logout();
     return redirect('/');
 }


);