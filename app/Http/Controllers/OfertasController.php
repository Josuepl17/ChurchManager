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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OfertasController extends Controller
{
    /*Ofertas*/

    public function filter_page(Request $request)
    {

            $dataIni = $request->input('dataini') ?? '1900-01-01';
            $dataFi = $request->input('datafi') ?? '5000-01-01';
            $user_id = Auth::id();
            $empresa_id = auth()->user()->empresa_id;

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
        $user_id = Auth::id();
        $data = $request->data;
        $empresa_id = auth()->user()->empresa_id;

        if (MeuServico::Verificar($data) == true) {
            $dados = $request->all();
            $dados['empresa_id'] = $empresa_id;
            $dados['user_id'] = $user_id;
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
        $data = $request->data;
        $verificar = MeuServico::Verificar($data);

        if ($verificar) {
            $destroy = $request->id;
            ofertas::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
            return $this->filter_page(MeuServico::post_filter($request));
    }



}
