<?php

namespace App\Http\Controllers;


use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\membros;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\empresas;
use App\Models\User;
use App\Services\MeuServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OfertasController extends Controller
{
    /*Ofertas*/

    public function filter_page(Request $request)
    {

        $dataIni = $request->dataini ?? '1900-01-01';
        $dataFi = $request->datafi ?? '5000-01-01';

        $empresa_id = Auth::user()->empresa_id; // acessa o dado da coluna do usuario conectado
        
       // $j = Auth::user()->ofertas->where('valor', '=', '50'); // pega  o usuario autenticado, e acessa a função Oferta, dentro da model User, definida no relacionamento ai faz um select com essa condição.
       //$teste = Auth::user();
      // $teste = $teste->empresas;
       //dd($teste);
       
        

        $dados = [
            'ofertas' => ofertas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->get(),
            'totalofertas' => ofertas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'dataini' => $request->dataini,
            'datafi' => $request->datafi
        ];


        if ($dataIni == '1900-01-01' && $dataFi == '5000-01-01') {
            unset($dados['dataini'], $dados['datafi']);
            return view('pagina.oferta', $dados);
        }

        return view('pagina.oferta', $dados);
    }




    public function botao_registrar_oferta(request $request)
    {
        if (MeuServico::Verificar($request->data) == true) {
            $dados = $request->all();
            $dados['user_id'] = Auth::id(); // acessa o ID do usuario Autenticado
            $dados['empresa_id'] = Auth::user()->empresa_id; // acessa o dado da coluna do usuario conectado
            $dados['valor'] = str_replace(',', '.', $dados['valor']);
            ofertas::create($dados);

            Session()->flash('sucesso', 'Item criado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado');
        }

        return $this->filter_page(MeuServico::post_filter($request));
    }


    public function botao_excluir_oferta(request $request)
    {

        if (MeuServico::Verificar($request->data)) {
            $destroy = $request->id;
            ofertas::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
        return $this->filter_page(MeuServico::post_filter($request));
    }
}
