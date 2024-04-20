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
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\Else_;

class DespesasController extends Controller
{
    /* Despesas */


    public function despesas()
    {
        $dados = [
            'datanow' => Carbon::now()->format('Y-m-d'),
            'despesas' => despesas::all(),
            'totaldespesas' => despesas::query()->sum('valor')
        ];

        return view('pagina.despesas', $dados);
    }


    public function botao_registrar_despesas(request $request)
    {

        $data = $request->data;

        if (MeuServico::Verificar($data) == true) {
            $dados = $request->all();
            despesas::create($dados);
            Session()->flash('sucesso', 'Item criado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado');
        }

        $dataini = $request->dataini;
        $datafi = $request->datafi;
        $newRequest = new Request();
        $newRequest->setMethod('post');
        $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
        return $this->filtrar_despesas($newRequest);
    }



    public function botao_excluir_despesas(request $request)
    {
        $data = $request->data;
        $verificar = MeuServico::Verificar($data);
       
        

        if ($verificar) {
            $destroy = $request->id;
            despesas::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }


        

        $dataini = $request->dataini;
        $datafi = $request->datafi;
        $newRequest = new Request();
        $newRequest->setMethod('post');
        $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
        return $this->filtrar_despesas($newRequest);
    }




    public function filtrar_despesas(Request $request)
    {
        $dataIni = $request->dataini;
        $dataFi = $request->datafi;

        $dados = [
            'despesas' => despesas::whereBetween('data', [$dataIni, $dataFi])->get(),
            'totaldespesas' => despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'dataIni' => $request->dataini,
            'dataFi' => $request->datafi
        ];


        if ($dataIni == null && $dataFi == null) {
            return $this->despesas();
        }

        return view('pagina.despesas', $dados);
    }
}
