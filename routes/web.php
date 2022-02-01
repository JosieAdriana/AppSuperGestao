<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;

/*
 |------------------------- | Web Routes |--------------------------- |
 Here is where you can register web routes for your application. These | 
 routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group.
 Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function () {return view('welcome');});
Route::get('/principal', [PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'SobreNos'])->name('site.sobrenos');
// Route::get('/contato', [ContatoController::class , 'formularioContato'])->name('site.contato');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('app')->group(function () {
  Route::get('/home',[HomeController::class, 'index'])-> name('app.home');
  Route::get('/sair',[LoginController::class, 'sair'])-> name('app.sair');
  Route::get('/cliente',[ClienteController::class, 'index'])->name('app.cliente');
  Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
  Route::post('/fornecedor/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::post('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');});
  Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');
  Route::fallback(function () {
  echo 'A rota acessada não existe, <a href= "' . route('site.index') . '"> clique aqui</a>  para ir para a página inicial.';
});

// VERBOS HTTP

/*
 * get
 * post
 * put
 * patch
 * delete
 * options
 */