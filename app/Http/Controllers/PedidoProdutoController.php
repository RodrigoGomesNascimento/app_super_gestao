<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoProduto;
use App\Produto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido, Produto $produtos)
    {
        //
        $produtos = Produto::all();
        //$pedido->produtos;//forma para imprementar o metodo agil eager loading// foi mudado para o foreach na view create do pedido_produto.
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {

       /*  echo "<pre>";
        //pedido esta sendo injetado no metodo como um objeto pois já foi pesquisado
            print_r($pedido);
        echo "</pre>";
        echo "<hr>";
        echo "<pre>";
        //já o produto esta vindo pelo mentodo get
            print_r($request->all());
        echo "</pre>";

        */

       $regras = [
            'produto_id' => 'exists:produto,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'Por favor digite a :attribute do produto pedido'
        ];

        $request->validate($regras, $feedback);

       //echo $pedido->id. '__' . $request->get('produto_id');
        /*jeito antigo antes feito que da certo
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        return redirect()->route('pedido-produto.create', ['pedido' =>$pedido->id]);
        */

        //chama o $pedido que já está relacionado, depois chamo o método produtos.

        //$pedido->produtos //retorno  será os registros do relacionamento entre produto e pedidos. se fizer assim $pedido->produtos() //isso será o objeto sendo coisas distintas.

        //$pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        //forma para lançar tudo na tela primeiro e depois enviar

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
            //$request->get('produto_id') => [$request->get('quantidade')] exemplo se houvesse mais campos.
        ]);
        return redirect()->route('pedido-produto.create', ['pedido' =>$pedido->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {

       // echo $pedido->id. ' - '.$produto->id;
        /*
       //metodo convencional
       PedidoProduto::where([
        'pedido_id' =>$pedido->id,
        'produto_id' => $produto->id

       ])->delete();

       return redirect()->route('pedido-produto.create', ['pedido' =>$pedido->id]);
        */
        // metodo detach (permite fazer o delete pelo relacionamento detach)
       // $pedido->produtos()->detach($produto->id);


        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id ]);
    }
}
