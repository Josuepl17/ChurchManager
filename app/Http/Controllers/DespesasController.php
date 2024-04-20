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

        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::all();
        $totalodespesas = despesas::query()->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totalodespesas)->with('datanow', $datanow);
    }


    public function botao_registrar_despesas(request $request)
    {

        $data = $request->data;

        if (MeuServico::Verificar($data) == true) {
            $dados = $request->all();
            despesas::create($dados);
            return redirect('/despesas');
        } else {
            echo  "deu ruim";
        }
    }





    /* public function botao_excluir_despesas(request $request)
    {
        $data = $request->data;



        if (MeuServico::Verificar($data) == true && MeuServico::filtro($request) == true) {
            $destroy = $request->id;
            despesas::destroy($destroy);

            $dataini = $request->dataini;
            $datafi = $request->datafi;
            $newRequest = new Request();
            $newRequest->setMethod('post');
            $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
            return $this->filtrar_despesas($newRequest);
        } elseif (MeuServico::Verificar($data) == false && MeuServico::filtro($request) == true) {
            $dataini = $request->dataini;
            $datafi = $request->datafi;
            $newRequest = new Request();
            $newRequest->setMethod('post');
            $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
            return $this->filtrar_despesas($newRequest);
        } elseif (MeuServico::Verificar($data) == true && MeuServico::filtro($request) == false) {
            $destroy = $request->id;
            despesas::destroy($destroy);
            return redirect('\despesas');
        } elseif (MeuServico::Verificar($data) == false && MeuServico::filtro($request) == false)
            return redirect('\despesas');
    } */





    public function botao_excluir_despesas(request $request)
    {
        $data = $request->data;
        $verificar = MeuServico::Verificar($data);
        $filtro = MeuServico::filtro($request);

        if ($verificar) {
            $destroy = $request->id;
            despesas::destroy($destroy);
        }

        $dataini = $request->dataini;

        $datafi = $request->datafi;
        $newRequest = new Request();
        $newRequest->setMethod('post');
        $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
        return $this->filtrar_despesas($newRequest);
    }










    /* public function filtrar_despesas(Request $request)
    {
        $dataIni = $request->dataini;
        $dataFi = $request->datafi;

       if ($dataIni == '1900-01-01' && $dataFi == '5000-01-01'){

        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas)->with('datanow', $datanow);

       } else {

        $datanow = Carbon::now()->format('Y-m-d');
        $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas)->with('dataIni', $dataIni)->with('dataFi', $dataFi)->with('datanow', $datanow);


       } */




    public function filtrar_despesas(Request $request)
    {
        $dataIni = $request->dataini;
        $dataFi = $request->datafi;
        $datanow = Carbon::now()->format('Y-m-d');

        $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');

        $viewData = [
            'despesas' => $despesas,
            'totaldespesas' => $totaldespesas,
            'datanow' => $datanow,
        ];

        if ($dataIni != '1900-01-01' || $dataFi != '5000-01-01') {
            /* Depois, há uma condição if que verifica se as datas de início ($dataIni) e fim ($dataFi) são diferentes de ‘1900-01-01’ e ‘5000-01-01’, respectivamente. Se a condição for verdadeira, o código adiciona mais dois pares de chave-valor ao array $viewData:

                'dataIni' => $dataIni: A chave é ‘dataIni’ e o valor é a variável $dataIni, que contém a data de início fornecida na solicitação.
                'dataFi' => $dataFi: A chave é ‘dataFi’ e o valor é a variável $dataFi, que contém a data de fim fornecida na solicitação. */
            $viewData['dataIni'] = $dataIni; 
            $viewData['dataFi'] = $dataFi;
        }

        return view('pagina.despesas', $viewData); /*Portanto, o array $viewData contém os dados que serão passados para a visão ‘pagina.despesas’. Se as datas de início e fim forem diferentes de ‘1900-01-01’ e ‘5000-01-01’, o array também incluirá essas datas*/
    }
}
