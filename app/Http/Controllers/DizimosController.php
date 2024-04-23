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

class DizimosController extends Controller
{
    /*Dizimos Por Usuario*/





    public function filter_page(Request $request)
    {

        $dataIni = $request->input('dataini') ?? '1900-01-01';
        $dataFi = $request->input('datafi') ?? '5000-01-01';


        

        $user_id = $request->user_id;
     
       
    




        $dados = [
            'dizimos' => dizimos::where('user_id', $user_id)->whereBetween('data', [$dataIni, $dataFi])->get(),
            
            'totaldizimos' => dizimos::query()->where('user_id', $user_id)->whereBetween('data', [$dataIni, $dataFi])->get()->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'dataini' => $request->dataini,
            'datafi' => $request->datafi,
            'user_id' => $request->user_id,
            'nome' => $request->nome
        ];

 



       
    
  


        if ($dataIni == '1900-01-01' && $dataFi == '5000-01-01') {
            unset($dados['dataini'], $dados['datafi']);
            
            return view('pagina.dizimo', $dados);
        }

        return view('pagina.dizimo', $dados);
    }






    public function botao_registrar_dizimo(request $request)
    {

        $data = $request->data;
       
        if (MeuServico::Verificar($data) == true) {
            $dados = $request->only('id', 'data', 'valor', 'user_id');
           
            $dados['valor'] = str_replace(',', '.', $dados['valor']);
         
            dizimos::create($dados);
            Session()->flash('sucesso', 'Item criado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado');
        }
        
        return $this->filter_page(MeuServico::post_filter($request));
       
    }






    public function botao_excluir_dizimo(request $request)
    {
        $data = $request->data;
        $verificar = MeuServico::Verificar($data);

        if ($verificar) {
            $destroy = $request->id;
            dizimos::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
        return $this->filter_page(MeuServico::post_filter($request));
    }
}
