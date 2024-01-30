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

class CaixasController extends Controller
{
        /*Caixa*/

        public function caixa()
        {
            $totalofertas = ofertas::query()->sum('valor');
            $totaldespesas = despesas::query()->sum('valor');
            $totaldizimos = dizimos::query()->sum('valor');
            return view('pagina.caixa')->with('totalofertas', $totalofertas)->with('totaldespesas', $totaldespesas)->with('totaldizimos', $totaldizimos);
        }
    
    
    
    
    
    
    
    
    
        /*RELATORIO*/
    
        public function relatorio()
        {
            $qtymembros = usuarios::count();
            $totalofertas = ofertas::query()->sum('valor');
            $totaldizimos = dizimos::query()->sum('valor');
            $totaldespesas = despesas::query()->sum('valor');
            return view('pagina.relatorio')->with('qtymembros', $qtymembros)->with('totalofertas', $totalofertas)->with('totaldizimos', $totaldizimos)->with('totaldespesas', $totaldespesas);
        }
    
    
    
        public function filtrarrelatorio(Request $request)
        {
    
            $dataIni = $request->get('dataini');
            $dataFi = $request->get('datafi');
            $totaldizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
            $totalofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
            $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
            $qtymembros = usuarios::count();
            return view('pagina.relatorio')->with('totaldizimos', $totaldizimos)->with('totaldespesas', $totaldespesas)->with('totalofertas', $totalofertas)->with('qtymembros', $qtymembros)->with('dataIni', $dataIni)->with('dataFi', $dataFi);
        }
    
    
        public function gerar(Request $request)
        {
    
            $dataIni = $request->dataini;
            $dataFi = $request->datafi;
    
            $dizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->get();
            $totaldizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
    
            $ofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->get();
            $totalofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
    
            $despesas = despesas::whereBetween('data', [$dataIni, $dataFi])->get();
            $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
    
    
            $variaveis = ['dizimos' => $dizimos, 'totaldizimos' => $totaldizimos, 'ofertas' => $ofertas, 'totalofertas' => $totalofertas, 'despesas' => $despesas, 'totaldespesas' => $totaldespesas];
            $pdf = pdf::loadView('pagina.fpdf', $variaveis);
            return $pdf->stream('Relatorio.pdf');
        }
    
    
    
    
    
        public function fechar_caixa(Request $request)
        {
            $primeiroregistro = caixas::value('dataini') ?? '1000-01-01';
            $ultimoregistro = caixas::latest('datafi')->first();
            $ultimo = $ultimoregistro->datafi ?? '1000-01-01';
            
            
        
    
    
            if ( $request->dataini > $primeiroregistro  && $request->datafi > $ultimo) {
               
                $dados = $request->except('_token');
                caixas::create($dados);
    
                session()->flash('alert', 'Caixa Fechado Com Sucesso');
                return redirect('/');
                
            } else {
                session()->flash('alert', 'Falha ao Fechar Caixa');
                return redirect('/relatorio');
                
            }
        }
}
