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

    public function formulario(){
        return view('pagina.formulario');
    }

    public function create(request $request){
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
        dizimos::destroy($destroy);
        return redirect('/dizimo');
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
        $dizimos = dizimos::all();
        return view('pagina.dizimo')->with('$dizimos', $dizimos);

    }

    public function dizimo(){
        $dizimos = dizimos::all();

        return view('pagina.dizimo')->with('dizimos', $dizimos);
    }

    public function inserir(request $request){
        $dizimos = dizimos::all();
        $user_id = $request->id;
        return view('pagina.dizimo')->with('user_id', $user_id)->with('dizimos', $dizimos);
    }


}
