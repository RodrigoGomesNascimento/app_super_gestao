<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use Illuminate\Http\Request;
use App\Unidade;
use App\ItemDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('produto-detalhe.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto-detalhe.form_create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // para usar o create tem que especificar a tabela e campo no model

        ProdutoDetalhe::create($request->all());
        echo "Cadastro realizado com sucesso";
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
     * era antes da mudança
     * public function edit(ProdutoDetalhe $produto_detalhe))
     */
    public function edit($id)
    {
        //
        //dd($produtoDetalhe);

        //para usar outro mapeamento teve que criar a variavel
        $produto_detalhe = ItemDetalhe::with(['item'])->find($id);
        $unidades = Unidade::all();

        return view('app.produto-detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  App\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        //
        $produto_detalhe->update($request->all());
        echo 'Atualização realizada com sucesso';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
