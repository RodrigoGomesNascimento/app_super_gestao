<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //criar um função para chamar a pagina e retorna-lá
    public function index(){
        return view('site.login', ['titulo' => 'Login']);//tem que passar o parametro titulo se não dá erro
    }
    public function autenticar(Request $request){
       // return "Chegamos até aqui!!!!!";
       //regras de validação através de array.
       $regras = [
            'usuario' => 'email',
            'senha' => 'required'
       ];

       //as mensagens de feedback de validação.

       $feedback = [
           'usuario.email' => 'O campo usuário (e-mail) é obrigatório' ,
           'senha.required' => 'O campo senha é obrigatório'
       ];

       $request->validate($regras, $feedback);

       //recebendo os dados do formulario.


       $email = $request->get('usuario');
       $password = $request->get('senha');

       echo "Usuário: $email | Senha: $password";
       echo '<br>';
       //print_r($request->all());

    }

}
