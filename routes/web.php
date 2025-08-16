<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/',
[   'as'=>'home',
    'uses'=>'App\Http\Controllers\homeController@index']);

//Login
Route::prefix('login')->group(function () {
    Route::get('/', 
    [   'as' => 'login',
        'uses'=>'App\Http\Controllers\loginController@index']);

    Route::post('/entrar',
    [   'as'=>'login.entrar',
        'uses'=>'App\Http\Controllers\loginController@entrar']);

    Route::get('/sair',
    [   'as'=>'login.sair',
        'uses'=>'App\Http\Controllers\loginController@sair']);
});
// cursos
Route::middleware('auth')->group( function () {
    Route::prefix('admin/cursos')->group(function () {
        Route::get('/',
        [   'as'  =>'admin.cursos',
            'uses'=>'App\Http\Controllers\Admin\CursoController@index']);

        Route::get('/adicionar',
        [   'as'  =>'admin.cursos.adicionar',
            'uses'=>'App\Http\Controllers\Admin\CursoController@adicionar']);

        Route::post('/salvar',
        [   'as'  =>'admin.cursos.salvar',
            'uses'=>'App\Http\Controllers\Admin\CursoController@salvar']);
        
        Route::get('/editar/{id}',
        [   'as'  =>'admin.cursos.editar',
            'uses'=>'App\Http\Controllers\Admin\CursoController@editar']);

        Route::put('/atualizar/{id}',
        [   'as'  =>'admin.cursos.atualizar',
            'uses'=>'App\Http\Controllers\Admin\CursoController@atualizar']);

        Route::get('/excluir/{id}',
        [   'as'  =>'admin.cursos.excluir',
            'uses'=>'App\Http\Controllers\Admin\CursoController@excluir']);
    });
});

// alunos
Route::middleware('auth')->group( function () {
    Route::prefix('admin/alunos')->group(function () {
        Route::get('/',
        [   'as'  =>'admin.alunos',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@index']);
        
        Route::get('/adicionar',
        [   'as'  =>'admin.alunos.adicionar',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@adicionar']);
        
        Route::post('/salvar',
        [   'as'  =>'admin.alunos.salvar',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@salvar']);
        
        Route::get('/editar/{id}',
        [   'as'  =>'admin.alunos.editar',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@editar']);
        
        Route::put('/atualizar/{id}',
        [   'as'  =>'admin.alunos.atualizar',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@atualizar']);
        
        Route::get('/excluir/{id}',
        [   'as'  =>'admin.alunos.excluir',
            'uses'=>'App\Http\Controllers\Admin\AlunoController@excluir']);
    });
});


//user
Route::middleware('auth')->group( function () {
    Route::prefix('admin/user')->group(function () {
        Route::get('/',
        [   'as'  =>'admin.user',
            'uses'=>'App\Http\Controllers\Admin\UserController@index']);
        
        Route::get('/adicionar',
        [   'as'  =>'admin.user.adicionar',
            'uses'=>'App\Http\Controllers\Admin\UserController@adicionar']);
        
        Route::post('/salvar',
        [   'as'  =>'admin.user.salvar',
            'uses'=>'App\Http\Controllers\Admin\UserController@salvar']);
        
        Route::get('/editar/{nome}',
        [   'as'  =>'admin.user.editar',
            'uses'=>'App\Http\Controllers\Admin\UserController@editar']);
        
        Route::put('/atualizar/{nome}',
        [   'as'  =>'admin.user.atualizar',
            'uses'=>'App\Http\Controllers\Admin\UserController@atualizar']);
        
        Route::get('/excluir/{nome}',
        [   'as'  =>'admin.user.excluir',
            'uses'=>'App\Http\Controllers\Admin\UserController@excluir']);
    });
});