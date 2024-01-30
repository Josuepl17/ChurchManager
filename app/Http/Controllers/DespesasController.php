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

class DespesasControler extends Controller
{
     /* Despesas */

     public function despesas()
     {
         $despesas = despesas::all();
         $totalodespesas = despesas::query()->sum('valor');
         return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totalodespesas);
     }
 
 
     public function botao_registrar_despesas(request $request)
     {
 
        
 
        
 
         $primeiroregistro = caixas::value('dataini') ?? '';
         $ultimoregistro = caixas::latest('datafi')->first();
         $ultimo = $ultimoregistro->datafi ?? '';
         
         
     
 
 
         if ( $request->data > $primeiroregistro  && $request->data > $ultimo) {
            
             $dados = $request->all();
              despesas::create($dados);
 
              /*$despesas = despesas::all(); Não se usa Mais porque ele retona para dados da pagin aanterir, não sendo necessario levar todas as variaveis denovo 
              $totaldespesas = despesas::query()->sum('valor');*/
 
              session()->flash('alert', 'Registro inserido com sucesso!');
 
              return redirect()->back(); /* OBS Feito assim para Não levar dados da pagin aem m aposisvel recarregação */
             
         } else {
             
            
             session()->flash('alert', 'Falha Ao Cadastrar, Caixa Fechado');
             return redirect()->back();
             
                 
           
             
 
         }
 
         
     }
 
 
 
         
         /*$post = new despesas;
         $post->data = $request->data;
         $post->descricao = $request->descricao;
         $post->valor = $request->valor;
         $post->save();*/
        
     
 
 
     public function botao_excluir_despesas(request $request)
     {
         $destroy = $request->id;
         despesas::destroy($destroy);
 
        /* $despesas = despesas::all();
         $totaldespesas = despesas::query()->sum('valor'); */
        /* return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas); */
 
        return redirect()->back();
     }
 
     public function filtrar_despesas(Request $request)
     {
         $dataIni = $request->get('dataini');
         $dataFi = $request->get('datafi');
 
         $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
         $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
         return view('pagina.despesas')->with('despesas', $despesas)->with('totaldespesas', $totaldespesas)->with('dataIni', $dataIni)->with('dataFi', $dataFi);
     }
 
}
