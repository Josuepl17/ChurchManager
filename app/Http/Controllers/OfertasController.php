<?php

namespace App\Http\Controllers;

use App\Services;
use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\usuarios;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Services\MeuServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Expr\FuncCall;

class OfertasController extends Controller
{
    /*Ofertas*/


    public function oferta()
    {
        $ofertas = ofertas::all();
        $datanow = Carbon::now()->format('Y-m-d');
        $totalofertas = ofertas::query()->sum('valor');
        $view = view('pagina.oferta', compact('ofertas', 'datanow', 'totalofertas'))->render();
        
        return response()->json($view);

    }



    public function botao_registrar_oferta(request $request)
    {
        
       $dados = $request->all();
        ofertas::create($dados);
        return redirect()->back();
    }


    public function botao_excluir_oferta(request $request)
    {

        $destroy = $request->id;
        ofertas::destroy($destroy);
        return redirect()->back();
    }

    public function filtrar(Request $request)
    {

        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $datanow = Carbon::now()->format('Y-m-d');
        $ofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totalofertas = ofertas::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('dataIni', $dataIni)->with('dataFi', $dataFi)->with('datanow', $datanow);
    }




}
