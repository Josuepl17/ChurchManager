<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerIgreja extends Controller
{
    public function index(){
        return view('pagina.index');
    }

}
