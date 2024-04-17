<?php

namespace App\Http\Controllers;


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

class DespesasController extends Controller
{
    /* Despesas */

    public function despesas()
    {
        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::all();
        $totalodespesas = despesas::query()->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totalodespesas)->with('datanow', $datanow);
    }


    public function botao_registrar_despesas(request $request)
    {

        $data = $request->data;
        
        $fun = new MeuServico();
        
        
       
        $verificar =  $fun->Vcreate($data);
        
        if($verificar == true){
            $dados = $request->all();
            despesas::create($dados);
           return redirect()->back();
        } else {
            echo  "deu ruim";
        }

        
    }





    public function botao_excluir_despesas(request $request)
    {
        $this->Vcreate($request);
        $resposta = $this->Vcreate($request);
        if ($resposta instanceof \Illuminate\Http\RedirectResponse) {
            return $resposta;
        }

        $destroy = $request->id;
        despesas::destroy($destroy);
        return redirect()->back();
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
