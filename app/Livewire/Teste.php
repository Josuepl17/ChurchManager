<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\membros;
use Illuminate\Http\Request;
use App\Models\empresas;
use App\Models\Eventos;
use App\Models\Eventos_presencas;
use App\Models\User;

class Teste extends Component
{

    public function index(Request $request)
    {
        $empresas_id = auth()->user()->empresa_id;
        $dados = $request->pesquisa;
        $razao_empresa = empresas::where('id', $empresas_id)->value('razao');

        $index = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($dados) . "%"])->where('empresa_id', $empresas_id)->get();

        $qtdEventos = count(Eventos::all());
        return view('paginas.index', compact('index', 'razao_empresa', 'dados', 'qtdEventos'));
    }


    public function render()
    {
        return view('pagina.');
    }
}
