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

class DizimosController extends Controller
{
    /*Dizimos Por Usuario*/

    public function botao_inserir(request $request)
    {
        $datanow = Carbon::now()->format('Y-m-d');
        $user_id = $request->id;
        $nome = $request->nome;
        $dizimos = dizimos::where('user_id', $user_id)->get();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos)->with('datanow', $datanow)->with('nome', $nome);
    }

    public function botao_registrar_dizimo(request $request)
    {

        $this->Vcreate($request);
        $resposta = $this->Vcreate($request);
        if ($resposta instanceof \Illuminate\Http\RedirectResponse) {
            return $resposta;
        }

        $dados = $request->except('_token');
        dizimos::create($dados);
        $user_id = $request->user_id;
        return redirect()->back();
    }

    public function botao_excluir_dizimo(request $request)
    {
        $this->Vcreate($request);
        $resposta = $this->Vcreate($request);
        if ($resposta instanceof \Illuminate\Http\RedirectResponse) {
            return $resposta;
        }

        $destroy = $request->id;

        $user_id = $request->user_id;
        dizimos::destroy($destroy);
        return redirect()->back();
    }

    public function filtrar_dizimo(Request $request)
    {
        $user_id = $request->user_id;
        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $nome = $request->nome;
        $datanow = Carbon::now()->format('Y-m-d');
        $dizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldizimos = dizimos::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos)->with('user_id', $user_id)->with('dataIni', $dataIni)->with('dataFi', $dataFi)->with('nome', $nome)->with('datanow', $datanow);
    }
}
