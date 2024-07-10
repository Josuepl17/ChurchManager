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
use App\Models\Relacionamento;
use App\Models\Relacionamentos;
use App\Models\user_empresas as ModelsRelacionamentos;
use App\Models\user_empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class ControllerLogin extends Controller
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
            
            $user_id = auth()->user()->id;
            $dados = user_empresas::where('user_id', $user_id)->pluck('empresa_id');
            $empresas = empresas::whereIn('id', $dados)->get();
            return view('login.selecionar-filial', compact('empresas'));
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

        if ($existirusuario) {
            $dados = (object) $dados;
            $senha =  hash::check($request->password, $existirusuario->password);
            Session()->flash('falha', 'Atenção! Usuario Já Esta Sendo Usado.');

            return view('login.cadastro', compact('dados'));
        }


        if ($existingEmpresa) {
            Session()->flash('falha', 'Atenção! Empresa Já Cadastrada.');
            return view('login.cadastro', compact('dados'));
        }

        $empresa = empresas::create([
            'razao' => $request->razao,
            'cnpj' => $request->cnpj
        ]);



        $user = new User();
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->empresa_id = $empresa->id;
        $user->save();


        
        $rela = new user_empresas();
            $rela->user_id = $user->id;
            $rela->empresa_id = $empresa->id;
            $rela->save();

        return redirect('/login');

      


    }

    public function adicionar_usuario(Request $request)
    {
        $user = new User();
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->empresa_id = auth()->user()->empresa_id;
        $user->save();

        $empresasMarcadas = $request->input('empresas');

        foreach ($empresasMarcadas as $emp){
            $rela = new user_empresas();
            $rela->user_id = $user->id;
            $rela->empresa_id = $emp;
            $rela->save();
        }
        

        return redirect('/login');
    }

    public function cad_empresas(){
        return view('login.empresa');
    }

    public function cad_empresas_novo(Request $request){

        $empresa = empresas::create([
            'razao' => $request->razao,
            'cnpj' => $request->cnpj
        ]);

        $rela = new user_empresas();
        $rela->user_id = auth()->user()->id;
        $rela->empresa_id = $empresa->id;
        $rela->save();
        
        return redirect('/login');
    }


    public function form_login()
    {
        return view('login.cadastro');
    }


    public function form_login_novo()
    {
            $user_id = auth()->user()->id;
            $dados = user_empresas::where('user_id', $user_id)->pluck('empresa_id');
            $empresas = empresas::whereIn('id', $dados)->get();

        return view('login.adicionar_user', compact('empresas'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile()
    {
        $empresa_id = auth()->user()->empresa_id;
        $users = User::where('empresa_id', $empresa_id)->get();
        $razao_empresa = empresas::where('id', $empresa_id)->value('razao');
        return view('pagina.telausers', compact('users', 'razao_empresa'));
    }
}
