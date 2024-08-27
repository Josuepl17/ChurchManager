<?php

namespace App\Livewire;

use Livewire\Component;

class BuscaMembros extends Component
{
    public $index2;

    public function updatedIndex2()
    {
        $this->dispatch('index2Updated', $this->index2);
    }

    public function render()
    {
        return view('livewire.busca-membros');
}
}




