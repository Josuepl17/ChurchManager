<?php
// Arquivo Documentado em "OfertasController.php"
namespace App\Http\Controllers;

use App\Events\FilaEmail;
use App\Jobs\EnvioEmail as JobsEnvioEmail;
use App\Mail\EnvioEmail;
use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\membros;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\empresas;
use App\Models\Jobs;
use App\Services\MeuServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DizimosController extends Controller
{
    /*Dizimos Por Usuario*/

//......................................................Parte 1................................................//
public $membro_id;

    public function filter_page()
    {

        $dataIni = Session()->get('dataini_d') ?? '1000-01-01';
        $dataFi = Session()->get('datafi_d') ?? '5000-01-01';
        $empresa_id = Auth::user()->empresa_id;
        $membro_id = Session()->get('membro_id');
       
      
        $dados = [
            'dizimos' => dizimos::where('empresa_id' , $empresa_id)->where('membro_id', $membro_id)->whereBetween('data', [$dataIni, $dataFi])->get(),
            'totaldizimos' => dizimos::where('empresa_id', $empresa_id)->whereBetween('data', [$dataIni, $dataFi])->get()->sum('valor'),
            'datanow' => Carbon::now()->format('Y-m-d'),
            'razao_empresa' => empresas::where('id', $empresa_id)->value('razao')
        ];

            return view('paginas.dizimo', $dados);
    }

//......................................................Parte 2................................................//

        public function filtro(Request $request){
            Session()->put('dataini_d', $request->dataini);
            Session()->put('datafi_d', $request->datafi);
            Session()->put('membro_id', $request->membro_id);
            Session()->put('nome', $request->nome);
            return redirect('/tela/dizimos');
        }



    public function botao_registrar_dizimo(request $request)
    {
        if (MeuServico::Verificar($request->data) == true) {
            $dados = $request->only('id', 'data', 'valor', 'membro_id');
            $dados['user_id'] = Auth::id();
            $dados['empresa_id'] = Auth::user()->empresa_id;
            $dados['valor'] = str_replace(',', '.', $dados['valor']);
            dizimos::create($dados);
            Session()->flash('sucesso', 'Item criado com Sucesso');

        } else {
            Session()->flash('falha',  'Falha ao criar item, Caixa Fechado');
        }

            return redirect('/tela/dizimos');
        }

//......................................................Parte 3................................................//

    public function botao_excluir_dizimo(request $request)
    {
        if (MeuServico::Verificar($request->data)) {
            $destroy = $request->id;
            dizimos::destroy($destroy);
            Session()->flash('sucesso',  'Item Apagado com Sucesso');
        } else {
            Session()->flash('falha',  'Falha ao apagar item, Caixa Fechado');
        }
           
            return redirect('/tela/dizimos');
    }


}


