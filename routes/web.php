<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 /* todas as suas rotas devem ser protegidas por middlewares.
 isso impede de que usuários maliciosos acessem rotas que não deveriam.
 [pendente!]
 */

/* POST CLIENTS */

 // Persiste cliente - POST RETURN
 Route::post('/client/create', 'ClientController@store')
 ->name('save_client')
 ->middleware('DirectorAcess');

 // Inserir novos setores - armazenamento
 Route::post("/client/{id}/addSector/", 'SectorController@store')
 ->name('save_sector')
 ->middleware('DirectorAcess');

 // Persiste alterações de clientes
 Route::post("/client/{id}/edit/{id_sector}", 'SectorController@edit')
 ->name('edit_client_save')
 ->middleware('DirectorAcess');


/* GET CLIENTS */
    
 // Exibe lista de clientes
 Route::get('/client','ClientController@clients')
 ->name('list_clients');

 // Inserir novos clientes - Formulario
 Route::get('/client/create','ClientController@createClient')
 ->name('form_create_client')
 ->middleware('DirectorAcess');

 // Exibe lista de setores do Cliente 
 Route::get('/client/{id}/sector', 'SectorController@sectors')
 ->name('list_sectors');

 // Edita setor do Cliente - Formulario
 Route::get("/client/{id}/edit/{id_sector}", 'SectorController@sectorEditForm')
 ->name('edit_sector_form')
 ->middleware('DirectorAcess');
 
 // Inserir novos setors - Formulario 
 Route::get("/client/{id}/addSector/", 'SectorController@createSector')
 ->name('sector_form')
 ->middleware('DirectorAcess');

 // Exibir setor selecionado
 Route::get("/client/{id}/view/{id_sector}", 'SectorController@sectorView')
 ->name('view_sector');
 


/* POST MEMBERS */

 // Persiste membro
 Route::post('/member/create', 'MemberController@store');

 // persiste novo cargo
 Route::post('/intern/role/create','RoleController@store')
 ->name('store_role');

 // Editar membros
 Route::post('/member/edit/{id}','MemberController@edit');


/* GET MEMBERS */

 // Listagem de membros
 Route::get('/member','MemberController@index')
 ->name('list_members')
 ->middleware('MemberAcess');

 // Formulario Criar membros
 Route::get('/member/create','MemberController@create')
 ->name('form_create_member')
 ->middleware('DirectorAcess');

 // Editar membros
 Route::get('/member/edit/{id}','MemberController@editForm')
 ->name('edit_member')
 ->middleware('DirectorAcess');

 // Lista de cargos
 Route::get('/intern/role','RoleController@index')
 ->name('list_roles')
 ->middleware('MemberAcess');

 // Formulario novo cargo
 Route::get('/intern/role/create','RoleController@create')
 ->name('form_create_role')
 ->middleware('DirectorAcess');
 
/* DELETE */

 // Apaga novo cargo
 Route::delete('/intern/role/{id}', 'RoleController@destroy')
 ->name('delete_role')
 ->middleware('DirectorAcess');

 // Apaga membro
 Route::delete('/member/{id}', 'MemberController@destroy')
 ->middleware('DirectorAcess');;

 // Apaga cliente 
 Route::delete('/client/{id}', 'ClientController@destroy')
 ->name('delete_client')
 ->middleware('DirectorAcess');

 // Apaga setor 
 Route::delete('/sector/{id}/{id_sector}', 'SectorController@destroy')
 ->name('delete_sector')
 ->middleware('DirectorAcess');


/* ACESS */
 
 // Formulario de login
 Route::get('/login','LoginController@acessForm')
 ->name('login');

 // Executa login
 Route::post('/login','LoginController@login');

 // Formulario novo usuario
 Route::get('/register','RegisterController@create')
 ->name('create_user');

 // Persistencia de novo usuario
 Route::post('/register','RegisterController@store')
 ->name('store_user');
 
 // Logout
 Route::get('/logout','LoginController@logout');


/* SUPORT AND GLOBAL */

 // Pagina inicial
 Route::get('/',function()
 {
   return view('index');
 });

/* EM DESENVOLVIMENTO E TEMPORARIOS */

 // Area de Gestão Interna da Empresa contratante
 Route::get('/intern','MemberController@internService')
 ->name('intern')
 ->middleware('MemberAcess');;







