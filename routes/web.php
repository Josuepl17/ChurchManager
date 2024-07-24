<?php

use App\Http\Controllers\CaixasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\DizimosController;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\User;
use App\Mail\EnvioEmail;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Session\Session;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Mail;
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
/*Route::get('/registrar/dizimo', [ControllerLogin::class, 'regdizimo']);*/



                            /*Usuarios*/
Route::get('/entrar/{id}', [MembrosController::class, 'Atualizar'])->middleware('auth');
Route::get('/', [MembrosController::class, 'index'])->name('index')->middleware('auth');
Route::get('/cadastro/membro', [MembrosController::class, 'cadastro_membro']);
Route::post('/inserir/membro', [MembrosController::class, 'botao_inserir_membro']);
Route::get('/destroy/{id}', [MembrosController::class, 'excluir_membro']);
Route::get('/lista/presencas', [MembrosController::class, 'lista_presenca']);

                            /*Dizimos Por Usuario*/
Route::post('/inserir/dizimos', [DizimosController::class, 'filtro']);
Route::post('/registrar/dizimo', [DizimosController::class, 'botao_registrar_dizimo']);
Route::post('/dizimos/destoy/id', [DizimosController::class, 'botao_excluir_dizimo']);
Route::get('/tela/dizimos', [DizimosController::class, 'filter_page']);


                             /*Ofertas*/
Route::get('/oferta', [OfertasController::class, 'filter_page'])->middleware('auth')->name('oferta'); // Link menu Oferta
Route::post('/registrar/oferta', [OfertasController::class, 'registrar_oferta'])->middleware('auth'); // Registra Uma oferta
Route::post('/destroy/ofertas/id', [OfertasController::class, 'botao_excluir_oferta'])->middleware('auth'); // Apaga uma Oferta 
Route::get('/filtrar/ofertas', [OfertasController::class, 'filtro'])->middleware('auth'); // Filtra as Ofertad


                            /* Despesas */
Route::get('/despesas', [DespesasController::class, 'filter_page']);
Route::POST('/registrar/despesas/igreja', [DespesasController::class, 'botao_registrar_despesas']);
Route::POST('/destroy/despesas/id', [DespesasController::class, 'botao_excluir_despesas']);
Route::post('/filtrar/despesas', [DespesasController::class, 'filtro']);

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
Route::get('/login', [ControllerLogin::class, 'login'])->name('login');
Route::post('/login/if', [ControllerLogin::class, 'authenticate']);
Route::get('/cadastro/login', [ControllerLogin::class, 'formulario_usuario_empresa']);
Route::post('/cadastro/usuario', [ControllerLogin::class, 'cadastro_usuario_empresa']);

Route::get('/cadastro/login/novo', [ControllerLogin::class, 'formulario_adicionar_usuario']);
Route::get('/editar/user/{user_id}', [ControllerLogin::class, 'formulario_editar_usuario']);
Route::post('/editar/user', [ControllerLogin::class, 'update_user']);
Route::post('/cadastro/user/adicionar', [ControllerLogin::class, 'adicionar_usuario']);
Route::get('/user/profile', [ControllerLogin::class, 'tela_usuarios']);

Route::get('/selecionar/filial', [ControllerLogin::class, 'selecionar_filial']);
Route::get('/cadastrar/empresas', [ControllerLogin::class, 'formulario_adicionar_empresa']);
Route::get('/cadastro/empresa/novo', [ControllerLogin::class, 'cadastro_empresas_nova']);


Route::get('/logout', [ControllerLogin::class, 'logout']);





