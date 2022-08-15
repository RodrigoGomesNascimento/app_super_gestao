<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$request - manipular

        //response - manipular.
       // dd($request);
        // para recuperar o ip, precisamos criar uma variável, onde terar o atributo server do request e o metodo get para apresentar o artibuto que fica o ip
        $ip = $request->server->get('REMOTE_ADDR');
        //teve que ajustar para o padrão camelcase.
        $rota= $request->getRequestUri();

        //para poder interpolar sem concatenar tem que mudar aspas simples para duplas.
        LogAcesso::create(['log' => "$ip , requisitou a rota $rota."]);
        return $next($request);
        //return response('Chegamos no middleware e finalizamo no proprio middleware.');

    }
}
