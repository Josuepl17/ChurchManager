<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\usuarios;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Vcreate(Request $request){

        $primeiroregistro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';

        if ( $request->data > $primeiroregistro  && $request->data > $ultimo) {
            session()->flash('alert', 'Registro inserido com sucesso!');
            return;
        } else {
            session()->flash('alert', 'Atenção!! O Caixa Esta Fechado');
            return redirect()->back();
            
            
        }

    }

}



