<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;

/*
  |------------------------- | Web Routes |--------------------------- |
 Here is where you can register web routes for your application. These | 
 routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group.
 Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function() {
    return view('partials.navbar');
});

Route::get('/principal', [PrincipalController::class , 'principal']);
Route::get('/sobre-nos', [SobreNosController::class , 'SobreNos']);
Route::get('/contato', [ContatoController::class , 'contato']);
//nome, categoria, assunto, mensagem


Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}', function(string $nome, string $categoria, string $assunto, string $mensagem) {
  echo "Estamos aqui:$nome - $categoria - $assunto - $mensagem";
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