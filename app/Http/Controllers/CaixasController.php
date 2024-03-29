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
use App\Http\Controllers\ControllerIgreja;

class CaixasController extends Controller
{
    /*Caixa*/

    public function caixa()
    {
        $totalofertas = ofertas::query()->sum('valor');
        $totaldespesas = despesas::query()->sum('valor');
        $totaldizimos = dizimos::query()->sum('valor');
        $saldo = $totaldizimos + $totalofertas - $totaldespesas;

        $view = view('pagina.caixa', compact('totalofertas', 'totaldespesas', 'totaldizimos', 'saldo'))->render();
        return response()->json($view);
    }



    public function relatorio()
    {
        $qtymembros = usuarios::count();
        $totalofertas = ofertas::query()->sum('valor');
        $totaldizimos = dizimos::query()->sum('valor');
        $totaldespesas = despesas::query()->sum('valor');
        $saldo = $totaldizimos + $totalofertas - $totaldespesas;
        return view('pagina.relatorio')->with('qtymembros', $qtymembros)->with('totalofertas', $totalofertas)->with('totaldizimos', $totaldizimos)->with('totaldespesas', $totaldespesas)->with('saldo', $saldo);
    }



    public function filtrarrelatorio(Request $request)
    {

        $dataIni = $request->get('dataini');
        $dataFi = $request->get('datafi');
        $totaldizimos = dizimos::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        $totalofertas = ofertas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        $totaldespesas = despesas::whereBetween('data', [$dataIni, $dataFi])->sum('valor');
        $saldo = $totaldizimos + $totalofertas - $totaldespesas;
        $qtymembros = usuarios::count();
        return view('pagina.relatorio')->with('totaldizimos', $totaldizimos)->with('totaldespesas', $totaldespesas)->with('totalofertas', $totalofertas)->with('qtymembros', $qtymembros)->with('dataIni', $dataIni)->with('dataFi', $dataFi)->with('saldo', $saldo);;
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

        $primeiroregistro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';

        if ($request->dataini > $primeiroregistro  && $request->datafi > $ultimo) {
            $dados = $request->except('_token');
            caixas::create($dados);
            session()->flash('alert', 'Registro inserido com sucesso!');
            return redirect('/relatorio');
        } else {
            session()->flash('alert', 'Atenção!! O Caixa Esta Fechado');
            return redirect('/relatorio');
        }
    }



    public function indexcaixa(){
        $dados = caixas::all();
        
        $saldo = caixas::query()->sum('saldo');;
        return view('pagina.caixa')->with('dados', $dados)->with('saldo', $saldo);
    }

    public function destroy_caixa(Request $request){
        $destroy = $request->id;
        caixas::destroy($destroy);
        
        return redirect()->back();
    }



}
