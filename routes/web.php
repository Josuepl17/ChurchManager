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

Route::get('/', [ControllerIgreja::class, 'index'])->middleware('auth');
Route::get('/cadastro/membro', [ControllerIgreja::class, 'cadastro_membro']);
Route::get('//inserir/membro', [ControllerIgreja::class, 'botao_inserir_membro']);
Route::get('/destroy/{id}', [ControllerIgreja::class, 'destroy']);
Route::get('/destroy/dizimos/{id}/{user_id}', [ControllerIgreja::class, 'destroydizimo']);
Route::get('/inserir/dizimos/{id}', [ControllerIgreja::class, 'inserir']);
Route::get('/dizimo', [ControllerIgreja::class, 'dizimo']);
Route::get('/registrar/dizimo', [ControllerIgreja::class, 'regdizimo']);

Route::get('/login', [ControllerIgreja::class, 'login'])->name('login');
Route::get('/login/if', [ControllerIgreja::class, 'verificar']);