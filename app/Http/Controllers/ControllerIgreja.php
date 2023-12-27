<?php

namespace App\Http\Controllers;

use App\Models\despesas;
use App\Models\ofertas;
use App\Models\usuarios;

use App\Models\dizimos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerIgreja extends Controller
{



    /*Usuarios*/
    public function index()
    {
        $index = usuarios::all();

        return view('pagina.index')->with('index',  $index);
    }

    public function cadastro_membro()
    {
        return view('pagina.formulario');
    }

    public function botao_inserir_membro(request $request)
    {
        $dados = $request->all();
        $DADOS1 =  array_map('strtoupper', array_map('strval', $dados));
        usuarios::create($DADOS1);
        return redirect('/');
    }


    public function excluir_membro(request $request)
    {
        $destroy = $request->id;
        dizimos::destroy($destroy);
       
        usuarios::destroy($destroy);
       
        return redirect('/');
    }




    /*Dizimos Por Usuario*/

    public function botao_inserir(request $request)
    {

        $user_id = $request->id;
        $dizimos = dizimos::where('user_id', $user_id)->get();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos);
    }

    public function botao_registrar_dizimo(request $request)
    {
        $user_id = $request->user_id;
        $post = new dizimos;
        $post->user_id = $user_id;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        $dizimos = dizimos::where('user_id', $user_id)->get();
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id)->with('totaldizimos', $totaldizimos);

        
    }

    public function botao_excluir_dizimo(request $request)
    {
        $destroy = $request->id;
        $user_id = $request->user_id;
        dizimos::destroy($destroy);
        $dizimos = dizimos::where('user_id', $user_id)->get();
        $totaldizimos = dizimos::query()->where('user_id', $user_id)->get()->sum('valor');
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id)->with('totaldizimos', $totaldizimos);
    }








    /*Ofertas*/


    public function oferta()
    {
        $ofertas = ofertas::all();

       
foreach ($ofertas as $oferta) {
    $dataFormatada = \Carbon\Carbon::parse($oferta->data)->format('d/m/Y');
    $oferta->data = $dataFormatada;
    $ofertas = $oferta;

}
        
     
        

        $totalofertas = ofertas::query()->sum('valor');

        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('dataFormatada', $dataFormatada);
        

        
    }


    public function botao_registrar_oferta(request $request)
    {
        $post = new ofertas;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();
        $ofertas = ofertas::all();
        $totalofertas = ofertas::query()->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas);
    }


    public function botao_excluir_oferta(request $request)
    {
        $destroy = $request->id;
        ofertas::destroy($destroy);
        $ofertas = ofertas::all();
        $totalofertas = ofertas::query()->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas);
    }

    /* Despesas */

    public function despesas()
    {
        $despesas = despesas::all();
        $totalodespesas = despesas::query()->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totalodespesas);
    }


    public function botao_registrar_despesas(request $request)
    {
        $post = new despesas;
        $post->data = $request->data;
        $post->descricao = $request->descricao;
        $post->valor = $request->valor;
        $post->save();
        $despesas = despesas::all();
        $totaldespesas = despesas::query()->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas);
    }


    public function botao_excluir_despesas(request $request)
    {
        $destroy = $request->id;
        despesas::destroy($destroy);
        $despesas = despesas::all();
        $totaldespesas = despesas::query()->sum('valor');
        return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas);
    }

    /*Caixa*/
    public function caixa()
    {
        $totalofertas = ofertas::query()->sum('valor');
        $totaldespesas = despesas::query()->sum('valor');
        $totaldizimos = dizimos::query()->sum('valor');
        return view('pagina.caixa')->with('totalofertas', $totalofertas)->with('totaldespesas', $totaldespesas)->with('totaldizimos', $totaldizimos);
    }

    public function filtrar(Request $request)
    {
      
        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $ofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->get();
        $totalofertas = ofertas::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas);
        
    }

    public function filtrar_dizimo(Request $request)
    {
        $user_id = $request->user_id;
        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $dizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->get();
        $totaldizimos = dizimos::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('totaldizimos', $totaldizimos)->with('user_id', $user_id);
        
    }
}
