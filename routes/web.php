<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', 'Site\SiteController@admin')->name('admin');

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
    Route::get('/editaservico/{id}', 'Site\ServicosController@editaServico');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-//

    // =-=-=-=-=-=-=--=-=-=-=-=-=-= Perfil Usuario =-=-=-=-=-=-==-=-=-=-=-=-=-=-=//
    Route::get('/mudasenha', 'Prestador\PrestadorController@mudaSenha');
    Route::post('/storesenha', 'Prestador\PrestadorController@storeSenha');
    Route::get('/meuperfil', 'Prestador\PrestadorController@meuPerfil');
    Route::post('/storeperfil', 'Prestador\PrestadorController@storePerfil');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=//


    Route::get('/teste', function(){
        $o = '123456789abcdefghijklmnopqrstuvxz';
        $a = substr($o, 0, 9);
        echo $a;
    });
});

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= Cliente =-=-=-=-=-=-==-=-=-==-=--=-=-=-=-=//
    Route::get('/meuservico', 'Site\SiteController@exibeServico')->name('meuservico');
    Route::get('/', 'Site\SiteController@index')->name('/');
    Route::get('/servicoslist/{id}', 'Site\SiteController@servicosList')->name('/servicoslist');
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=//


