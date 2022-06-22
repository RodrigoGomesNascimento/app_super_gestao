<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
     public function contato() {

        // para testar se esta chengando os dados
        //var_dump($_POST);
        return view('site.contato', ['titulo' =>'Contato']);
    }
}
