<?php

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'Site\SiteController@index');

    // =-=-=-=-=-=-=-=-=-=-=-=-= Rotas de Equipamentos =-=-=-=-=-=-=-=-=-=-=-=-=-//
    Route::get('/equipamentos', 'site\EquipamentosController@exibeEquipamentos');
    Route::get('/novoequip', 'Site\EquipamentosController@novoEquipamento');
    Route::post('/validaequip', 'Site\EquipamentosController@cadastrar');
    Route::get('/editaequip/{id}', 'Site\EquipamentosController@editaEquipamento');
    Route::post('/salvaequipamento/{id}', 'Site\EquipamentosController@salvaEquipamento');
    Route::get('/excluiequipamento/{id}', 'Site\EquipamentosController@excluiEquipamento');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-//

    // =-=-=-=-=-=-=-=-=-=-=-=-=-= Rotas de Clientes =-=-=-=-=-=-=-=-=-=-=-=-=-=-//
    Route::get('/novocliente', 'Site\clientesController@novoCliente');
    Route::post('/validacliente', 'Site\clientesController@validaCliente');
    Route::get('/listaclientes', 'Site\clientesController@listaClientes');   
    Route::get('/editacliente/{id}', 'Site\clientesController@editaCliente');
    Route::post('/salvacliente/{id}', 'Site\clientesController@salvaCliente');
    Route::get('/excluicliente/{id}', 'Site\clientesController@excluiCliente');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-//

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-= Rotas de Serviços =-=-=-=-=-=-=-=-=-=-=-=-=-//
    Route::get('/novoservico', 'Site\ServicosController@novoServico');
    Route::post('/validaservico', 'Site\ServicosController@validaServico');
    Route::get('/abertos', 'Site\ServicosController@abertos');
    Route::get('/ematendimento', 'Site\ServicosController@ematendimento');
    Route::get('/fechados', 'Site\ServicosController@fechados');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-//
});

Auth::routes();


