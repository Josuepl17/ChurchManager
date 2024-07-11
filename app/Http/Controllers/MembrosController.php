<?php

namespace App\Http\Controllers;


use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\membros;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class MembrosController extends Controller
{
    /*membros*/

    public function Atualizar(Request $request){
        //dd($this->empresas);
        User::where('id', auth()->id())->update(['empresa_id' => $request->id]);
       // $user = Auth::user(); // usuario autenticado 
       // $user = $user->empresas;
        //$empresas = $user->empresas; // acesso as empresas ligadas ao meu usuario autenticado 
        
        return redirect('/');
    }

    public function index(Request $request)
    {
        $dados = $request->pesquisa;
        $razao_empresa = empresas::where('id', auth()->user()->empresa_id)->value('razao');
        $user = Auth::user();

        if ($dados != null) {
            $index = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($dados) . "%"])->where('empresa_id', auth()->user()->empresa_id)->get();

            return view('pagina.index', compact('index', 'razao_empresa', 'dados'));

        } else {
            $index = membros::where('empresa_id', auth()->user()->empresa_id)->get();
            return view('pagina.index', compact('index', 'razao_empresa'));
        }
    }

    public function cadastro_membro()
    {
        $razao_empresa = empresas::where('id', auth()->user()->empresa_id)->value('razao');
        return view('pagina.formulario', compact('razao_empresa'));
    }

    public function botao_inserir_membro(request $request)
    {
        $user_id = Auth::id();
        $dados = $request->all();
        $dados['user_id'] = $user_id;
        $dados['empresa_id'] = auth()->user()->empresa_id;
        $dados =  array_map('strtoupper', array_map('strval', $dados));
        membros::create($dados);
        return redirect('/');
    }


    public function excluir_membro(request $request)
    {
        $destroy = $request->id;
        membros::destroy($destroy);
        return redirect('/');
    }
}
