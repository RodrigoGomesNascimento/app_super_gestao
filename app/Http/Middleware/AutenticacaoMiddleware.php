<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
       /*//codigo de exemplo aula
        echo $metodo_autenticacao. ' - '. $perfil . '<br>';

        if($metodo_autenticacao == 'padrao')
        {
            echo "Verificar o usuário e a senha no banco de dado $perfil".'<br>';
        }
        if($metodo_autenticacao == 'ldap')
        {
            echo "Verificar o usuário e a senha no AD  $perfil".'<br>';
        }
        if($perfil == 'visitante')
        {
            echo 'Exibir apenas alguns recusos'.'<br>';
        }else {
            echo 'Carregar perfil do banco de dados'.'<br>';
        }
        if(false){
             return $next($request);
        }else{
            return response('Acesso negado!Rota exige Autenticação!!');
        }

       // return $next($request);
        */

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
