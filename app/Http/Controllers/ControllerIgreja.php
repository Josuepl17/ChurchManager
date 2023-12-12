<?php

namespace App\Http\Controllers;

use App\Models\usuarios;

use App\Models\dizimos;
use Illuminate\Http\Request;

class ControllerIgreja extends Controller
{
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


    public function excluir_usuario(request $request){
        $destroy = $request->id;
        dizimos::destroy($destroy);
        usuarios::destroy($destroy);
        return redirect('/');
    }

    public function destroydizimo(request $request){
        $destroy = $request->id;
        $user_id = $request->user_id;
        dizimos::destroy($destroy);
        $dizimos = dizimos::where('user_id', $user_id)->get();
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id);
    }

    public function login(){
        
        return view('login.index');
    }

    


    public function regdizimo(request $request){
        $user_id = $request->user_id;
        
        $post = new dizimos;
        $post->user_id = $user_id;
        $post->data = $request->data;
        $post->valor = $request->valor;
        $post->save();
        $dizimos = dizimos::where('user_id', $user_id)->get();
       
        return view('pagina.dizimo')->with('dizimos', $dizimos)->with('user_id', $user_id);

    }


    public function inserir(request $request){
        
        $user_id = $request->id;
        $dizimos = dizimos::where('user_id', $user_id)->get();
        /*$select = dizimos::select('valor')->where('user_id', '=', $user_id)->get();*/
        
    
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos);
    }


}
