<?php

namespace App\Livewire;

use App\Models\Eventos;
use App\Models\membros;
use Livewire\Component;

class Results extends Component
{
    public $index2;

    protected $listeners = ['index2Updated' => 'updateIndex2'];

    public function updateIndex2($index2)
    {
        $this->index2 = $index2;
    }

    public function render()
    {
       

        $empresas_id = auth()->user()->empresa_id;

        $index = membros::whereRaw('LOWER(nome) LIKE ?', ["%" . strtolower($this->index2) . "%"])->where('empresa_id', $empresas_id)->get();
        $qtdEventos = count(Eventos::all());

        return view('livewire.results', compact('index', 'qtdEventos'));
}
}
