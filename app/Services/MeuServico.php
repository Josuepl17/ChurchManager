<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\caixas;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\If_;

class MeuServico
{

    public function Verificacaixa(Request $data){
        $primeiroregisttro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';
        


        if ($data > $primeiroregisttro && $data > $ultimo){
            return true;
        }
        else{
            return false;
        }

        


    }







}
