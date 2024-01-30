<?php

namespace App\Http\Controllers;

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

class ControllerIgreja extends Controller
{



    public function Vcreate(Request $request){

        $primeiroregistro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';

        if ( $request->data > $primeiroregistro  && $request->data > $ultimo) {
            session()->flash('alert', 'Registro inserido com sucesso!');
           return;
        } else {
            session()->flash('alert', 'Atenção!! O Caixa Esta Fechado');
            return redirect('/relatorio');
            
        }

    }











    










    



   








    /* LOGIN*/




    public function login()
    {
        return view('login.index');
    }

    public function verificar(Request $request)
    {
        $senha = $request->only('senha')['senha'];
        $index = usuarios::all();

        if ($senha == 1234) {

            return view('pagina.index')->with('index',  $index);
        } else {
            echo "Falha";
        }
    }
}
