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



    public function Vcreate(Request $request){

        $primeiroregistro = caixas::value('dataini') ?? '';
        $ultimoregistro = caixas::latest('datafi')->first();
        $ultimo = $ultimoregistro->datafi ?? '';

        if ( $request->data > $primeiroregistro  && $request->data > $ultimo) {
            session()->flash('alert', 'Registro inserido com sucesso!');
           return;
        } else {
            session()->flash('alert', 'Atenção!! O Caixa Esta Fechado');
            return redirect('/relatorio');
            
        }


        




    }



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
            return redirect()->intended('index');
        }
    
        // Autenticação falhou
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
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
    
}
