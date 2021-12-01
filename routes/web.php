<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;


/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
/* Route::get('/', function () {
 return 'Seja bem-vindo'; });
 
*/
/* Route::get('/', function () {
 return 'Seja bem vindo';
 }); */

Route::get('/principal',[PrincipalController::class, 'principal']);

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class , 'SobreNos']);

Route::get('/contato', [\App\Http\Controllers\ContatoController::class , 'contato']);








/*
 verbo http
 
get post put patch delete options */
