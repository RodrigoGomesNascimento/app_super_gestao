<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\HTTP\Middleware\LogAcessoMiddleware;

class SpbreNosController extends Controller
{
    //função para chamar o midllware.
   public function __construct()
    {
        //tem que trazer a classe, trazer o middlware no construtor de um controlador.
        //$this->middleware(LogAcessoMiddleware::class);
        //pode se chamar o middleware atraves do apelido dado no kernel route
        $this->middleware('log.acesso');
    }

    public function sobrenos(){
        return view('site.sobre-nos');
    }
}
