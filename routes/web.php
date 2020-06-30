<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* POST */

 /* todas as suas rotas devem ser protegidas por middlewares.
 isso impede de que usuários maliciosos acessem rotas que não deveriam.
 [pensente!]
 */

 // Persiste membro
 Route::post('/member/create', 'MemberController@store');
    
 // Persiste cliente - POST RETURN
 Route::post('/client/create', 'ClientController@store')
 ->name('save_client')
 ->middleware('LoginDirector');

 // Inserir novos setores - armazenamento
 Route::post("/client/{id}/addSector/", 'SectorController@store')
 ->name('save_sector')
 ->middleware('LoginDirector');

 // Persiste alterações de clientes
 Route::post("/client/{id}/edit/{id_sector}", 'SectorController@edit')
 ->name('edit_client_save')
 ->middleware('LoginDirector');

/* DELETE */

 // Apaga membro
 Route::delete('/member/{id}', 'MemberController@destroy');

 // Apaga cliente 
 Route::delete('/client/{id}', 'ClientController@destroy')
 ->name('delete_client')
 ->middleware('LoginDirector');

 // Apaga setor 
 Route::delete('/sector/{id}/{id_sector}', 'SectorController@destroy')
 ->name('delete_sector')
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

 // Exibe lista de setores do Cliente 
 Route::get('/client/{id}/sector', 'SectorController@sectors')
 ->name('list_sectors');

 // Edita setor do Cliente - Formulario
 Route::get("/client/{id}/edit/{id_sector}", 'SectorController@sectorEditForm')
 ->name('edit_sector_form')
 ->middleware('LoginDirector');
 
 // Inserir novos setors - Formulario 
 Route::get("/client/{id}/addSector/", 'SectorController@createSector')
 ->name('sector_form')
 ->middleware('LoginDirector');

 // Exibir setor selecionado
 Route::get("/client/{id}/view/{id_sector}", 'SectorController@sectorView')
 ->name('view_sector');
 
/* ACESS AND SUPORT [GET AND POST] */
 
 // Formulario de login
 Route::get('/login','LoginController@acessForm')->name('login');

 // Executa login
 Route::post('/login','LoginController@login');

 // Formulario novo usuario
 Route::get('/sector','SectorController@create')->name('create_user');

 // Persistencia de novo usuario
 Route::post('/sector','SectorController@store')->name('store_user');
 // Logout
 Route::get('/logout',function(){
     Auth::logout();
     return redirect('/');
 });

  // PAGINA INICIAL.
  Route::get('/','index@mainView');


/* EM DESENVOLVIMENTO E TEMPORARIOS */

 // ACESSO PESSOAL TEMPORARIO
 Route::get('/manager','ManageProject@soFar');








