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

class OfertasController extends Controller
{
   /*Ofertas*/



   public function oferta()
   {






       /* $ofertas = new ofertas();
       $ofertas->nome = ofertas::all()->pluck('nome');
       $ofertas->data = ofertas::all()->pluck('data');
       $ofertas->valor = ofertas::all()->pluck('valor');
       $ofertas->id = ofertas::all()->pluck('id');
       dd($ofertas->nome);*/

       
       $ofertas = ofertas::all();
       $datanow = Carbon::now();

       $totalofertas = ofertas::query()->sum('valor');
       return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('datanow', $datanow);
   }



   public function botao_registrar_oferta(request $request)
   {
       



       
       $this->Vcreate($request);

       $dados = $request->all();
       ofertas::create($dados);
       /*$post = new ofertas;
       $post->data = $request->data;
       $post->valor = $request->valor;
       $post->save();*/
       $ofertas = ofertas::all();
       return redirect('/oferta');
   }


   public function botao_excluir_oferta(request $request)
   {
       $destroy = $request->id;
       ofertas::destroy($destroy);
       $ofertas = ofertas::all();
       $totalofertas = ofertas::query()->sum('valor');
       return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas);
   }

   public function filtrar(Request $request)
   {

       $dataIni = $request->get('dataini');
       $dataFi = $request->get('datafi');
       $ofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->get();
       $totalofertas = ofertas::query()->whereBetween('data', [$dataIni, $dataFi])->sum('valor');
       return view('pagina.oferta')->with('ofertas', $ofertas)->with('totalofertas', $totalofertas)->with('dataIni', $dataIni)->with('dataFi', $dataFi);
   }
}
