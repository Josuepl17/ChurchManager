<?php

namespace App\Http\Controllers;

use App\Models\caixas;
use App\Models\despesas;
use App\Models\ofertas;
use App\Models\usuarios;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\dizimos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class ControllerIgreja extends Controller
{




    /* LOGIN*/




    public function login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->only( 'user','password');
    
        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect('/');
        }
    
        // Autenticação falhou
        Session()->flash('falha',  'Login Incorreto');
        return redirect('/login');
        
    }





    public function cadastro_user(Request $request){
        
        $user = new User();
        $user->user = $request->user;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');
    

    }


    public function form_login(){
        return view('login.cadastro');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
    
    
}
