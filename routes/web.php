<?php

use App\Http\Controllers\CaixasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerIgreja;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\DizimosController;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\OfertasController;
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
Route::get('/', [MembrosController::class, 'index'])->name('index')->middleware('auth');
Route::get('/cadastro/membro', [MembrosController::class, 'cadastro_membro']);
Route::post('/inserir/membro', [MembrosController::class, 'botao_inserir_membro']);
Route::post('/destroy/{id}', [MembrosController::class, 'excluir_membro']);

                            /*Dizimos Por Usuario*/
Route::get('/inserir/dizimos/{membro_id}/{nome}', [DizimosController::class, 'filter_page']);
Route::post('/registrar/dizimo', [DizimosController::class, 'botao_registrar_dizimo']);
Route::post('/dizimos/destoy/id', [DizimosController::class, 'botao_excluir_dizimo']);
Route::get('/filtrar/dizimo/{user_id}/{nome}', [DizimosController::class, 'filter_page']);


                             /*Ofertas*/
Route::get('/oferta', [OfertasController::class, 'filter_page'])->middleware('auth');
Route::post('/registrar/oferta', [OfertasController::class, 'botao_registrar_oferta'])->middleware('auth');
Route::post('/destroy/ofertas/id', [OfertasController::class, 'botao_excluir_oferta'])->middleware('auth');
Route::get('/filtrar/ofertas', [OfertasController::class, 'filter_page'])->middleware('auth');

                            /* Despesas */
Route::get('/despesas', [DespesasController::class, 'filter_page']);
Route::POST('/registrar/despesas/igreja', [DespesasController::class, 'botao_registrar_despesas']);
Route::POST('/destroy/despesas/id', [DespesasController::class, 'botao_excluir_despesas']);
Route::post('/filtrar/despesas', [DespesasController::class, 'filter_page']);

                                /*Caixa*/
//Route::get('/caixa', [CaixasController::class, 'filter_page']);
Route::get('/relatorio', [CaixasController::class, 'filter_page']);
Route::get('/fpdf', [CaixasController::class, 'fpdf']);
Route::post('/filtro/pdf', [CaixasController::class, 'filter_page']);
Route::get('/gerar/{dataini}/{datafi}', [CaixasController::class, 'gerar']);
Route::post('/fechar', [CaixasController::class, 'fechar_caixa']);
Route::get('/indexcaixa', [CaixasController::class, 'indexcaixa']);
Route::post('/destroy/caixa/{id}', [CaixasController::class, 'destroy_caixa']);




                             /* LOGIN*/
Route::get('/login', [ControllerIgreja::class, 'login'])->name('login');
Route::post('/login/if', [ControllerIgreja::class, 'authenticate']);

Route::get('/cadastro/login', [ControllerIgreja::class, 'form_login']);
Route::post('/cadastro/usuario', [ControllerIgreja::class, 'cadastro_user']);
Route::get('/cadastro/login/novo', [ControllerIgreja::class, 'form_login_novo']);
Route::post('/cadastro/user/adicionar', [ControllerIgreja::class, 'adicionar_usuario']);



Route::get('/logout', [ControllerIgreja::class, 'logout']);
Route::get('/pesquisa', [MembrosController::class, 'pesquisa']);
Route::get('/user/profile', [ControllerIgreja::class, 'profile']);