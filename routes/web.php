<?php

use App\Fornecedores;
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
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function(){

    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    //Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');

    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');//foi necessario criar uma via get para paginação.
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');//id é obrigatorio por isso não tem o ?
    Route::get('/fornecedor/excluir/{id}}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');//id é obrigatorio por isso não tem o ?
//produtos

    //Route::get('/produto', 'ProdutoController@index')->name('app.produto');
   //como usou o metodo resource para criar o controller pode se unificar tudo com esse método.
   Route::resource('produto', 'ProdutoController');

   // produto detalhe

   Route::resource('produto-detalhe', 'ProdutoDetalheController');

   //Cliente

   Route::resource('cliente', 'ClienteController');
   Route::resource('pedido', 'PedidoController');
  // Route::resource('pedido_produto', 'PedidoProdutoController');//vai precisar ser customizada pois ira precisar do produto e do pedido passado por parametro.

    Route::get('pedido_produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido_produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    //Route::delete('pedido_produto.destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
    Route::delete('pedido_produto.destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');

});

Route::fallback(function() {
    echo 'A Rota acessada não exite. <a href="'.route('site.index').'">Clique aqui</a> para ir para pagina index';
});

     Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

