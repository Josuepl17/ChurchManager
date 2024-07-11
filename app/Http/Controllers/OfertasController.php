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
    //......................................................Parte 1................................................//
    public function filter_page(Request $request)
    {
        
        $dataIni = $request->dataini ?? '1900-01-01'; // Se tem requisção ele usa e não tem o padrão é 1900-01-01 
        $dataFi = $request->datafi ?? '5000-01-01'; // Se tem requisção ele usa e não tem o padrão é 5000-01-01 
        $empresa_id = Auth::user()->empresa_id; // acessa o dado da coluna do usuario conectado


        $dados = [ // Pega todas as variaveis em m lugar só
            'ofertas' => ofertas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->get(),
            'totalofertas' => ofertas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'dataini' => $request->dataini,
            'datafi' => $request->datafi,
            'razao_empresa' => empresas::where('id', $empresa_id)->value('razao')
        ];

        // Verifica se veio com a Data Padrão, ele remove da Variavel acima a variavel data para Não exibir Na Pagina 
        if ($dataIni == '1900-01-01' && $dataFi == '5000-01-01') {
            unset($dados['dataini'], $dados['datafi']);
            return view('pagina.oferta', $dados);
        } else // Senão for a Data Padrão, Ele retorna a Pagina Com a data Que veio na requisição
            return view('pagina.oferta', $dados);
    }



    //......................................................Parte 2................................................//

    public function registrar_oferta(request $request)
    {
        if (MeuServico::Verificar($request->data)) { // verifica se as data esta entre as duas datas do caixa
            $dados = $request->all();
            $dados['user_id'] = Auth::id(); // acessa o ID do usuario Autenticado e inseri na variavel dados
            $dados['empresa_id'] = Auth::user()->empresa_id; // acessa o dado da coluna do usuario conectado e inseri na variavel dados
            $dados['valor'] = str_replace(',', '.', $dados['valor']); // Troca virgula por Ponto e Inseri na Variavel Dados 
            ofertas::create($dados); // Cria o Registro da Nova Oferta
            Session()->flash('sucesso', 'Item criado com Sucesso'); // Retorna a mensagem de Sucesso

        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado'); // Retorna Falha
        }

        return $this->filter_page(MeuServico::post_filter($request)); // Retorna a Função de Filtro Fazendo um Envio do Tipo Request 
    }

    //......................................................Parte 3................................................//

    public function botao_excluir_oferta(request $request)
    {
        if (MeuServico::Verificar($request->data)) { //verifica se as data esta entre as duas datas do caixa
            $destroy = $request->id;
            ofertas::destroy($destroy); // apaga o registro que tenha esse ID
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
        return $this->filter_page(MeuServico::post_filter($request)); // Retorna a Função de Filtro Fazendo um Envio do Tipo Request 
    }
}
