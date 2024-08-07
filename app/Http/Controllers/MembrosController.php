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

        User::where('id', auth()->id())->update(['empresa_id' => $request->id]);
        return redirect('/');
    }

    public function index(Request $request)
    {
        $empresas_id = auth()->user()->empresa_id;
        $dados = $request->pesquisa;
        $razao_empresa = empresas::where('id', $empresas_id)->value('razao');

            $index = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($dados) . "%"])->where('empresa_id', $empresas_id)->get();
            return view('paginas.index', compact('index', 'razao_empresa', 'dados'));

    }

    public function cadastro_membro()
    {
        $empresas_id = auth()->user()->empresa_id;
        $razao_empresa = empresas::where('id', $empresas_id)->value('razao');
        return view('paginas.formulario-membro', compact('razao_empresa'));
    }

    public function botao_inserir_membro(request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = Auth::id();
        $dados['empresa_id'] = auth()->user()->empresa_id;
        $dados =  array_map('strtoupper', array_map('strval', $dados));
        membros::create($dados);
        return redirect('/');
    }


    public function excluir_membro(request $request)
    {
        $destroy = $request->id;
        membros::destroy($destroy); //banco de dados com apagar cascade, todos os dizimos desses usuarios vão ter apagados tambem
        return redirect('/');
    }

    public function lista_presenca(){
        $membros = membros::all();
        $empresa_id = Auth::user();
        $razao_empresa = $empresa_id->empresas->first();
        $razao_empresa = $razao_empresa->razao;
        return view('paginas.formulario_presenca', compact('membros', 'razao_empresa'));
    }

    
}
