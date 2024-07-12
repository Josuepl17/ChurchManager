<?php
// Arquivo Documentado em "OfertasController.php"
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
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;

class DespesasController extends Controller
{

//......................................................Parte 1................................................//
    public function filter_page(Request $request)
    {
        $dataIni = $request->dataini ?? '1900-01-01';
        $dataFi = $request->datafi ?? '5000-01-01';
        $empresa_id = auth()->user()->empresa_id;

       

        $dados = [
            'despesas' => despesas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->get(),
            'totaldespesas' => despesas::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'dataini' => $request->dataini,
            'datafi' => $request->datafi,
            'razao_empresa' => empresas::where('id', $empresa_id)->value('razao')
        ];


        if ($dataIni == '1900-01-01' && $dataFi == '5000-01-01') {
            unset($dados['dataini'], $dados['datafi']);
            return view('pagina.despesas', $dados);
        }

        return view('pagina.despesas', $dados);
    }

//......................................................Parte 2................................................//
    public function botao_registrar_despesas(request $request)
    {

        if (MeuServico::Verificar($request->data) == true) {
            $dados = $request->all();
            $dados['user_id'] = Auth::id(); //acessa o ID do usuario Autenticado
            $dados['empresa_id'] = Auth::user()->empresa_id; // acessa o dado da coluna do usuario conectado
            $dados['valor'] = str_replace(',', '.', $dados['valor']);
            despesas::create($dados);
            
            Session()->flash('sucesso', 'Item criado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado');
        }
        return $this->filter_page(MeuServico::post_filter($request));
    }

//......................................................Parte 3................................................//

    public function botao_excluir_despesas(request $request)
    {
        if (MeuServico::Verificar($request->data)) {
            $destroy = $request->id;
            despesas::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
        return $this->filter_page(MeuServico::post_filter($request));
    }
}
