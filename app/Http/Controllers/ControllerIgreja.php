<?php

namespace App\Http\Controllers;

use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\membros;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\empresa;
use App\Models\empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class ControllerIgreja extends Controller
{




    /* LOGIN*/




    public function login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->only('user', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect('/');
        }

        // Autenticação falhou
        Session()->flash('falha',  'Login Incorreto');
        return redirect('/login');
    }





    public function cadastro_user(Request $request)
    {

        $existingEmpresa = empresas::where('cnpj', $request->cnpj)->first();
        $existirusuario = User::where('user', $request->user)->first();
        if($existirusuario){
           $senha =  hash::check($request->password, $existirusuario->password);
        }


    
        if ($existingEmpresa) {
            Session()->flash('falha', 'Atenção! Empresa Já Cadastrada.');
            return redirect()->back();
        } 

        if ($existirusuario != null  && $senha = true ) {
            Session()->flash('falha', 'Atenção! Usuario Já Cadastrado.');
            return redirect()->back();
        } 



        $empresa = new empresas();
        $empresa->razao = $request->razao;
        $empresa->cnpj = $request->cnpj;
        $empresa->save();


        $user = new User();
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->empresa_id = $empresa->id;



        $user->save();

        return redirect('/login');
    }

    public function adicionar_usuario(Request $request)
    {
        $user = new User();
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->empresa_id = auth()->user()->empresa_id;
        $user->save();
        return redirect('/login');
    }


    public function form_login()
    {
        return view('login.cadastro');
    }

    public function form_login_novo()
    {
        return view('login.cadastro_user');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile(){
        $empresaath = Auth::user()->empresa_id;
        $users = User::where('empresa_id', $empresaath)->get();
        $nomeempresa = empresas::where('id', $empresaath)->first();
        return view('pagina.telausers')->with('users', $users)->with('nomeempresa', $nomeempresa);
    }
}
