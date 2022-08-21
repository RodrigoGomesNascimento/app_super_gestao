<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //criar um função para chamar a pagina e retorna-lá
    public function index(Request $request){

        //recuperar o erro
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválido!';
        } ;
        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para acesso a pagina';
        } ;

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);//tem que passar o parametro titulo se não dá erro
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
       /*
       echo "Usuário: $email | Senha: $password";
       echo '<br>';
       */
       //iniciar o model User
       $user = new User();

       $usuario = $user->where('email', $email)->where('password', $password)->get()->first();// metodo first() retorna o primeiro registro do array get()

       if(isset($usuario->name)){
        //echo "Usuario existe";
        //dd($usuario);//para ver os atributos.

        //iniciar a super global session para verificar se o usuario está logado

        session_start();
        $_SESSION['nome'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;
        //dd($_SESSION);

        //redirecionar para as paginas onde são necessário o login
        return redirect()->route('app.home');

       }else{
        //echo "Usuario não existe.";
        return redirect()->route('site.login', ['erro' => 1]);
       }
      /* echo '<pre>';
       print_r($usuario);
       echo '<pre>';
       */
       //print_r($request->all());

    }

    public function sair(){
        //echo "sair";
        session_destroy();//destroi a section onde e redireciona para a pagina inicial.
        return redirect()->route('site.index');
    }
}
