<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //chamada da viwe para o controller
    public function index(){
        return view('app.cliente');
    }

}
