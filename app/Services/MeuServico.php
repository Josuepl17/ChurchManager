<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\caixas;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\If_;

class MeuServico
{

    public static function Verificar($data)
    {

        $primeiroregistro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';

        if ($data > $primeiroregistro  && $data > $ultimo) {

            return true;
        } else {

            return false;
        }
    }


    public static function post_filter($request)
    {

        $dataini = $request->dataini;
        $datafi = $request->datafi;
        $newRequest = new Request();
        $newRequest->setMethod('post');
        $newRequest->request->add(['dataini' => $dataini, 'datafi' => $datafi]);
        return $newRequest;
    }
}
