<?php

namespace App\Http\Controllers;


use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\usuarios;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

class MembrosController extends Controller
{
    /*Usuarios*/
    public function index()
    {
        $index = usuarios::all();
        return view('pagina.index')->with('index',  $index);
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
        usuarios::create($dados);
        return redirect('/');
    }


    public function excluir_membro(request $request)
    {
        $destroy = $request->id;
        //dizimos::where('user_id', $destroy)->forceDelete();
        usuarios::destroy($destroy);
        return redirect('/');
    }


    public function pesquisa (Request $request){
        $dados = $request->pesquisa;
       
        $index = usuarios::where('nome', 'LIKE', "%{$dados}%")->get();
        return view('pagina.index')->with('index',  $index);
    }
}
