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

        $credentials['user'] = strtolower($credentials['user']); // maiusculo ou minusculo

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
        $dados = $request->all();
        $existingEmpresa = empresas::where('cnpj', $request->cnpj)->first();
        $existirusuario = User::where('user', $request->user)->first();
        if($existirusuario){
            $dados = (object) $dados;
            
           
            
           $senha =  hash::check($request->password, $existirusuario->password);
            Session()->flash('falha', 'Atenção! Usuario Já Esta Sendo Usado.');
            
            return view('login.cadastro')->with('dados', $dados);
        }


    
        if ($existingEmpresa) {
            Session()->flash('falha', 'Atenção! Empresa Já Cadastrada.');
            return view('login.cadastro')->with('dados', $dados);
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
        
        return view('login.adicionar_user');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile(){
        $empresa_id = auth()->user()->empresa_id;
        
        $users = User::where('empresa_id', $empresa_id)->get();
      
        $razao_empresa = empresas::where('id', $empresa_id)->value('razao');
        return view('pagina.telausers')->with('users', $users)->with('razao_empresa', $razao_empresa);
    }
}

