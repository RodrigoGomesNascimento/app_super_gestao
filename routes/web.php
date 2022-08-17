<?php

use App\Http\Controllers\ContatoControler;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

    Route::get('/', function () {
    return view('welcome');
});

/* //rotas com parametros
    rotas com parametros podem tb ser passada em branco ou desde que haja uma
    previsão para isso como (?) e os argumentos padrões passados para preenchimento
    e tem que ser da direita para a esquerda.

    Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{menssagem?}', function(
    string $nome = 'Desconhecido',
    string $categoria = 'Indefinida',
    string $assunto = 'Não especificado',
    string $menssagem = 'Mensagem não adicionada'

    ){
    echo "Estamos aqui : $nome - $categoria - $assunto - $menssagem" ;
});

//parametros com expressões regulares.

Route::get('/contato/{nome}/{categoria_id}', function(
    string $nome = 'Desconhecido',
    int $categoria_id = 1 //1 - 'Informação',
    ){
    echo "Estamos aqui : $nome - $categoria_id" ;
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');//tem que ser inteiro e pelo menos um numero.
/*Redirecionamento de rotas
     Route::get('/rota1', function() {
     echo 'Rota 1 ';
 })->name('site.rota1');

 Route::get('/rota2', function() {

     return redirect()->route('site.rota1');

 })->name('site.rota2');

 //Route::redirect('/rota2', '/rota1');
 */

//Route::middleware(LogAcessoMiddleware::class)->get('/', 'PrincipalController@principal')->name('site.index');
//foi retirada a chamada do middleware para fazar a chamda geral
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobrenos', 'SpbreNosController@sobrenos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
//abaixo o sera utilizado uma funcao de calback para imprimir o formulario de login.
//Route::get('/login', function(){return 'Login';})->name('site.login');
Route::get('/login', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function(){

    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

Route::fallback(function() {
    echo 'A Rota acessada não exite. <a href="'.route('site.index').'">Clique aqui</a> para ir para pagina index';
});

     Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

