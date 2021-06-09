<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// ROTA DE HOME
Route::match(['get','post'], '/', [ProdutoController::class, 'index'])
    ->name('home');

// ROTA DE CATEGORIA
Route::match(['get','post'], '/categoria', [ProdutoController::class, 'categoria'])
    ->name('categoria');

// ROTA DE CATEGORIA POR UM ID 
Route::get('/categoria/{id}', [ProdutoController::class, 'categoryById']);

// ROTA DE CADASTRAR 
Route::match(['get','post'], '/cadastrar', [ClienteController::class, 'cadastrar'])
    ->name('cadastrar');

// ROTA DE LOGIN DO USUÁRIO 
Route::match(['get','post'], '/logar', [UsuarioController::class, 'logar'])
    ->name('logar');

// ROTA DE LOGOUT DO USUÁRIO 
Route::get('/sair', [UsuarioController::class, 'sair'])->name('sair');

// ROTA DE CADASTRO DE CLIENTES
Route::match(['get','post'], '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])
    ->name('cadastrar_cliente');

// ROTA DE ADICIONAR PRODUTOS NO CARRINHO 
Route::match(['get','post'], '/{idProduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])
    ->name('adicionar_carrinho');

// ROTA DE VER PRODUTOS NO CARRINHO
Route::match(['get','post'], '/carrinho', [ProdutoController::class, 'verCarrinho'])
    ->name('ver_carrinho');

// ROTA DE VER PRODUTOS NO CARRINHO
Route::match(['get','post'], '/{indice}/excluircarrinho', [ProdutoController::class, 'excluirCarrinho'])
    ->name('excluir_carrinho');

// ROTA DE FINALIZAR COMPRA
Route::post('/carrinho/finalizar', [ProdutoController::class, 'finalizar'])
    ->name('carrinho_finalizar');

// ROTA HISTÓRICO DE COMPRAS
Route::match(['get','post'],'/compras/historico', [ProdutoController::class, 'historico'])
    ->name('compra_historico');  
    
// ROTA HISTÓRICO DE COMPRAS
Route::post('/compras/detalhes', [ProdutoController::class, 'detalhes'])
    ->name('compra_detalhes');  