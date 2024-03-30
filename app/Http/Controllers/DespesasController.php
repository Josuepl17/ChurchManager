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

class DespesasController extends Controller
{
    /* Despesas */

    public function despesas()
    {
        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::all();
        $totaldespesas = despesas::query()->sum('valor');

        $view = view('pagina.despesas', compact('despesas', 'datanow', 'totaldespesas'))->render();
        return response()->json($view);
        
    }


    public function botao_registrar_despesas(request $request)
    {
        
        
        $dados = $request->all();
        despesas::create($dados);
        return redirect('/');
        
        
        
        
    }





    public function botao_excluir_despesas(request $request)
    {
        $destroy = $request->id;
        despesas::destroy($destroy);
        return;
    }

    public function filtrar_despesas(Request $request)
    {
        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas)->with('dataIni', $dataIni)->with('dataFi', $dataFi)->with('datanow', $datanow);;
    }
}
