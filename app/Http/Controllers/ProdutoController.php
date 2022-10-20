<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $produto = Produto::paginate(10);

        return view('app.produto.index', ['produto' => $produto, 'request' => $request->all()]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();//recuperar o dados e mandar para view como segundo parametro

        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //CONSTRUTOR DAS REGRAS DE VALIDAÇÃO

        $regra = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'//exist tem dois parametros tabela e coluna.

        ];

        //construtor das mensagens de feedback para o usuário

        $feedback = [
            'required' => 'O campo  :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min'=> 'O campo descricao deve ter no mínimo 3 caracteres',
            'descricao.max'=> 'O campo descricao deve ter no máximo 2000 caracteres',
            'peso.integer' => 'Somente numeros inteiros',
            'unidade_id.exists' => 'A unidade de medida informada não existe'

        ];

        $request->validate($regra, $feedback);
        //este metodo já é criado através do resourse e normalmente não implementa uma view e já vem com o request

        Produto::create($request->all());//dessa forma pode ser feita pq foi configurada a model para receber dados de modo massivo.
        /*
            outra forma é a debaixo ótima para tratar campos antes de salvar.
           $produto = new Produto();

                $nome = $request->get('nome');
                $descricao = $request->get('descricao');
                $peso = $request->get('peso');
                $unidade_id = $request->get('unidade_id');

                //trantando o nome para caixa alta
                $nome = strtoupper($nome);

                $produto->nome = $nome;
                $produto->descricao = $descricao;
                $produto->peso = $peso;
                $produto->unidade_id = $unidade_id;

                $produto->save();

         */


        return redirect()->route('produto.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //ja-se tem no contexto um objeto sendo carregado.
        //dd($produto);
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //está tipado pra receber um produto.
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
        /*
        print_r($request->all()); //payload
        echo '<br><br><br>';
        print_r($produto->getAttributes());//Instancia do objeto no estado anterior.*/

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        //dd($produto);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
