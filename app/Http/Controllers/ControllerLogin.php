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
use App\Services\MeuServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class ControllerLogin extends Controller
{

//......................................................LOGIN E AUTH................................................//

    public function login()
    {
        return view('login.index');
    }

    public function formulario_usuario_empresa()
    {
        return view('login.cadastro');
    }

    public function cadastro_usuario_empresa(Request $request)
    {
        $dados = $request->all();

        if (MeuServico::verificar_login($request)) {
            $dados = (object) $dados;
            Session()->flash('falha', 'Atenção! Usuario Já Cadastrado.');
            return view('login.cadastro', compact('dados'));
        }

        if (MeuServico::verificar_empresa($request)) {
            Session()->flash('falha', 'Atenção! Empresa Já Cadastrada.');
            return view('login.cadastro', compact('dados'));
        }

        $empresa = empresas::create([
            'razao' => $request->razao,
            'cnpj' => $request->cnpj
        ]);

        $user = new User();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->empresa_id = $empresa->id;
        $user->nivel = 'admin';
        $user->save();

        $user_empresas = new user_empresas();
        $user_empresas->user_id = $user->id;
        $user_empresas->empresa_id = $empresa->id;
        $user_empresas->save();
        return redirect('/login');

    }

    public function autenticar_usuario(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]) || Auth::attempt(['email' => strtoupper($credentials['email']), 'password' => $credentials['password']])) {
            return redirect('/selecionar/filial');
        }
        Session()->flash('falha',  'Login Incorreto');
        return redirect('/login');
    }


    //......................................................Usuario................................................//

    public function tela_usuarios()
    {
        $user_id = auth()->user()->id;
        $relacionamentos = user_empresas::where('user_id', $user_id)->pluck('empresa_id'); // peguei as empresas relacionadas ao meu usuario.
        $empresas = user_empresas::whereIn('empresa_id', $relacionamentos)->pluck('user_id'); // peguei todos os usuarios relacionados as empresas 
        $users = User::whereIn('id', $empresas)
             ->where('id', '!=', auth()->user()->id)
             ->get(); // busquei 

        //$razao_empresa = empresas::where('id', auth()->user()->empresa_id)->value('razao');
        return view('login.tela-usuarios', compact('users'));
    }

    public function formulario_adicionar_usuario()
    {
            $user_id = auth()->user()->id;
            $dados = user_empresas::where('user_id', $user_id)->pluck('empresa_id');
            $empresas = empresas::whereIn('id', $dados)->get();
            return view('login.adicionar_user', compact('empresas'));
    }

    public function adicionar_usuario(Request $request)
    {

       if (MeuServico::verificar_login($request)) {
            Session()->flash('falha',  'Email Já cadastrado');
             return redirect('/cadastro/login/novo');
        } else{
            $user = new User();
            $user->nome = $request->user;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->empresa_id = auth()->user()->empresa_id;
            $user->save();

            $empresasMarcadas = $request->input('empresas');

            foreach ($empresasMarcadas as $emp){
                $user_empresas = new user_empresas();
                $user_empresas->user_id = $user->id;
                $user_empresas->empresa_id = $emp;
                $user_empresas->save();
            }
        }

        return redirect('/user/profile');
    }




    public function formulario_editar_usuario(Request $request)
    {
            $user_id = auth()->user()->id;
            $dados = user_empresas::where('user_id', $user_id)->pluck('empresa_id');
            $empresas = empresas::whereIn('id', $dados)->get();
            $user_editar = User::find($request->user_id);
            $empresasSelecionadas = user_empresas::where('user_id', $user_editar->id)->pluck('empresa_id')->toArray();
             return view('login.editar_user', compact('empresas', 'user_editar', 'empresasSelecionadas'));
    }

    public function editar_usuario(Request $request){
        $user = User::find($request->user_id);
        user_empresas::where('user_id', $request->user_id)->delete(); // nunca pode ser do adm
        
        $user->user = $request->user;
        $user->email = $request->email;
        $user->save();
    
        $empresasMarcadas = $request->empresas;

        foreach ($empresasMarcadas as $emp){
            $user_empresas = new user_empresas();
            $user_empresas->user_id = $user->id;
            $user_empresas->empresa_id = $emp;
            $user_empresas->save();
        }
        return redirect('/user/profile');
    }







//......................................................EMPRESAS................................................//

        public function selecionar_filial(){
            $user_id = auth()->user()->id;
            $relacionamentos = user_empresas::where('user_id', $user_id)->pluck('empresa_id');
            $empresas = empresas::whereIn('id', $relacionamentos)->get();
            return view('login.selecionar-filial', compact('empresas'));
       }


    public function formulario_adicionar_empresa(){
        $user_id = auth()->user()->id;
        $relacionamentos = user_empresas::where('user_id', $user_id)->pluck('empresa_id'); // peguei as empresas relacionadas ao meu usuario.
        $users_id = user_empresas::whereIn('empresa_id', $relacionamentos)->pluck('user_id'); // peguei todos os usuarios relacionados as empresas 
        $users = User::whereIn('id', $users_id)
             ->where('id', '!=', auth()->user()->id)
             ->get(); // busquei 
           
        return view('login.adicionar-filial', compact('users'));
    }

    public function adicionar_empresa(Request $request){

        $request->validate([
            'user' => 'required|array|min:1',
        ], [
            'user.required' => 'Você deve selecionar pelo menos uma empresa.',
            'user.min' => 'Você deve selecionar pelo menos uma empresa.',
        ]);


        $empresa = empresas::create([
            'razao' => $request->razao,
            'cnpj' => $request->cnpj
        ]);

        $usuariosMarcados = $request->input('user');
     
        foreach ($usuariosMarcados as $user){
            $user_empresas = new user_empresas();
            $user_empresas->user_id = $user;
            $user_empresas->empresa_id = $empresa->id;
            $user_empresas->save();
        }
        //relacionando usuario ADM  
        $user_empresas = new user_empresas();
        $user_empresas->user_id = auth()->user()->id;
        $user_empresas->empresa_id = $empresa->id;
        $user_empresas->save();

        return redirect('/selecionar/filial');
    }

//......................................................Logaut................................................//


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
