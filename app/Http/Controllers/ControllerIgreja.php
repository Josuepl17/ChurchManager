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
        usuarios::create($dados);
           return redirect('/');

    }


    public function destroy(request $request){
        $destroy = $request->id;
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

    
    public function verificar( request $request){
        
        if(Auth::attempt($request->only('email', 'password'))){
         return redirect('/');
        } else{
            return redirect('/login');
        }

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
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos);
    }


}
