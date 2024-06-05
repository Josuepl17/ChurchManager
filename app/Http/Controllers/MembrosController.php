<?php

namespace App\Http\Controllers;


use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\membros;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class MembrosController extends Controller
{
    /*membros*/
    public function index(Request $request)
    {
        $id_empresa_autenticada = auth()->user()->empresa_id;
        $dados = $request->pesquisa;
        $empresa_id = auth()->user()->empresa_id;
        $razao_empresa = empresas::where('id', $empresa_id)->value('razao');

        if ($dados != null) {
            $index = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($dados) . "%"])->get();
            $indexbusca = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($dados) . "%"])->first();


            return view('pagina.index')->with('index',  $index,)->with('razao_empresa', $razao_empresa)->with('dados', $dados);
        } else {
            $index = membros::where('empresa_id', $id_empresa_autenticada)->get();
            return view('pagina.index')->with('index',  $index,)->with('razao_empresa', $razao_empresa);
        }
    }

    public function cadastro_membro()
    {
        return view('pagina.formulario');
    }

    public function botao_inserir_membro(request $request)
    {
        $user_id = Auth::id();
        $empresa_id = auth()->user()->empresa_id;
        $dados = $request->all();
        $dados['user_id'] = $user_id;
        $dados['empresa_id'] = $empresa_id;
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
