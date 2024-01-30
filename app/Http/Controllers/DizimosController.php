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

class DizimosControler extends Controller
{
    /*Dizimos Por Usuario*/

    public function botao_inserir(request $request)
    {

        $user_id = $request->id;
        $dizimos = dizimos::where('user_id', $user_id)->get();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos);
    }

    public function botao_registrar_dizimo(request $request)
    {
        $dados = $request->except('_token');


        dizimos::create($dados);
        $user_id = $request->user_id;

        /*$post = new dizimos;
        $post->user_id = $user_id;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();*/
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        $dizimos = dizimos::where('user_id', $user_id)->get();
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id)->with('totaldizimos', $totaldizimos);
    }

    public function botao_excluir_dizimo(request $request)
    {
        $destroy = $request->id;
        $user_id = $request->user_id;
        dizimos::destroy($destroy);
        $dizimos = dizimos::where('user_id', $user_id)->get();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id)->with('totaldizimos', $totaldizimos);
    }

    public function filtrar_dizimo(Request $request)
    {
        $user_id = $request->user_id;
        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $dizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldizimos = dizimos::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos)->with('user_id', $user_id)->with('dataIni', $dataIni)->with('dataFi', $dataFi);
    }
}
