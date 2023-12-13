<?php

namespace App\Http\Controllers;

use App\Models\ofertas;
use App\Models\usuarios;

use App\Models\dizimos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerIgreja extends Controller
{



                   /*Usuarios*/
    public function index(){
        $index = usuarios::all();
        return view('pagina.index')->with('index',  $index);
    }

    public function cadastro_membro(){
        return view('pagina.formulario');
    }

    public function botao_inserir_membro(request $request){
        $dados = $request->all();
        $DADOS1 =  array_map('strtoupper' , array_map('strval' , $dados));
        usuarios::create($DADOS1);
           return redirect('/');

    }


    public function excluir_membro(request $request){
        $destroy = $request->id;
        dizimos::destroy($destroy);
        usuarios::destroy($destroy);
        return redirect('/');
    }




                     /*Dizimos Por Usuario*/

    public function botao_inserir(request $request){
        
        $user_id = $request->id;
        $dizimos = dizimos::where('user_id', $user_id)->get();
        
       return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos);
        
    }

    public function botao_registrar_dizimo(request $request){
        $user_id = $request->user_id;
        $post = new dizimos;
        $post->user_id = $user_id;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();
        $dizimos = dizimos::where('user_id', $user_id)->get();
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id);

    }

    public function botao_excluir_dizimo(request $request){
        $destroy = $request->id;
        $user_id = $request->user_id;
        dizimos::destroy($destroy);
        $dizimos = dizimos::where('user_id', $user_id)->get();
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id);
    }



    




                                     /*Ofertas*/


    public function oferta(){
        $ofertas = ofertas::all();
        $totalofertas = ofertas::select('valor')->get();
        return view('pagina.oferta')->with('ofertas', $ofertas);
    }


    public function botao_registrar_oferta(request $request){
        $post = new ofertas;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();
        $ofertas = ofertas::all();
        return view('pagina.oferta')->with('ofertas', $ofertas);

    }


    public function botao_excluir_oferta(request $request){
        $destroy = $request->id;
        ofertas::destroy($destroy);
        $ofertas = ofertas::all();
        return view('pagina.oferta')->with('ofertas', $ofertas);
    }



}
