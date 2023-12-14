<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerIgreja;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/registrar/dizimo', [ControllerIgreja::class, 'regdizimo']);*/



                            /*Usuarios*/
Route::get('/', [ControllerIgreja::class, 'index']);
Route::get('/cadastro/membro', [ControllerIgreja::class, 'cadastro_membro']);
Route::get('//inserir/membro', [ControllerIgreja::class, 'botao_inserir_membro']);
Route::get('/destroy/{id}', [ControllerIgreja::class, 'excluir_membro']);

                            /*Dizimos Por Usuario*/
Route::get('/inserir/dizimos/{id}', [ControllerIgreja::class, 'botao_inserir']);
Route::get('/registrar/dizimo', [ControllerIgreja::class, 'botao_registrar_dizimo']);
Route::get('/destroy/dizimos/{id}/{user_id}', [ControllerIgreja::class, 'botao_excluir_dizimo']);


                             /*Ofertas*/
Route::get('/oferta', [ControllerIgreja::class, 'oferta']);
Route::get('/registrar/oferta', [ControllerIgreja::class, 'botao_registrar_oferta']);
Route::get('/destroy/oferta/{id}', [ControllerIgreja::class, 'botao_excluir_oferta']);

                            /* Despesas */
Route::get('/despesas', [ControllerIgreja::class, 'despesas']);
Route::get('/registrar/despesas', [ControllerIgreja::class, 'botao_registrar_despesas']);
Route::get('/destroy/despesas/{id}', [ControllerIgreja::class, 'botao_excluir_despesas']);

                                /*Caixa*/
Route::get('/caixa', [ControllerIgreja::class, 'caixa']);