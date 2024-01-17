<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerIgreja;
use App\Http\Controllers\User;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controller as RoutingController;
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
Route::post('/inserir/membro', [ControllerIgreja::class, 'botao_inserir_membro']);
Route::post('/destroy/{id}', [ControllerIgreja::class, 'excluir_membro']);

                            /*Dizimos Por Usuario*/
Route::get('/inserir/dizimos/{id}', [ControllerIgreja::class, 'botao_inserir']);
Route::post('/registrar/dizimo', [ControllerIgreja::class, 'botao_registrar_dizimo']);
Route::post('/destroy/dizimos/{id}/{user_id}', [ControllerIgreja::class, 'botao_excluir_dizimo']);


                             /*Ofertas*/
Route::get('/oferta', [ControllerIgreja::class, 'oferta']);
Route::post('/registrar/oferta', [ControllerIgreja::class, 'botao_registrar_oferta']);
Route::post('/destroy/oferta/{id}', [ControllerIgreja::class, 'botao_excluir_oferta']);

                            /* Despesas */
Route::get('/despesas', [ControllerIgreja::class, 'despesas']);
Route::post('/registrar/despesas', [ControllerIgreja::class, 'botao_registrar_despesas']);
Route::post('/destroy/despesas/{id}', [ControllerIgreja::class, 'botao_excluir_despesas']);

                                /*Caixa*/
Route::get('/caixa', [ControllerIgreja::class, 'caixa']);
Route::get('/filtrar', [ControllerIgreja::class, 'filtrar']);
Route::get('/filtrar/dizimo/{user_id}', [ControllerIgreja::class, 'filtrar_dizimo']);

Route::get('/filtrar/despesas', [ControllerIgreja::class, 'filtrar_despesas']);


Route::get('/relatorio', [ControllerIgreja::class, 'relatorio']);
Route::get('/fpdf', [ControllerIgreja::class, 'fpdf']);
Route::post('/filtro/pdf', [ControllerIgreja::class, 'filtrarrelatorio']);
Route::get('/gerar/{dataini}/{datafi}', [ControllerIgreja::class, 'gerar']);

Route::get('/login', [ControllerIgreja::class, 'login'])->name('login');

Route::post('/login/if', [ControllerIgreja::class, 'verificar']);
Route::post('/fechar/', [ControllerIgreja::class, 'ver']);

