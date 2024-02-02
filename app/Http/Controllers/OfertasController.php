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
use Illuminate\Http\RedirectResponse;


class OfertasController extends Controller
{
    /*Ofertas*/






    public function oferta()
    {
        $ofertas = ofertas::all();
        $datanow = Carbon::now()->format('Y-m-d');
        $totalofertas = ofertas::query()->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('datanow', $datanow);
    }



    public function botao_registrar_oferta(request $request)
    {

        $this->Vcreate($request);
        $resposta = $this->Vcreate($request);
        if ($resposta instanceof \Illuminate\Http\RedirectResponse) {
            return $resposta;
        }


        $dados = $request->all();
        ofertas::create($dados);
        return redirect()->back();
    }


    public function botao_excluir_oferta(request $request)
    {
        $this->Vcreate($request);
        $resposta = $this->Vcreate($request);
        if ($resposta instanceof \Illuminate\Http\RedirectResponse) {
            return $resposta;
        }

        $destroy = $request->id;
        ofertas::destroy($destroy);
        return redirect()->back();
    }

    public function filtrar(Request $request)
    {

        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $ofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totalofertas = ofertas::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('dataIni', $dataIni)->with('dataFi', $dataFi);
    }
}
