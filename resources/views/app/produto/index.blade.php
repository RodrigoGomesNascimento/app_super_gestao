@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="" width="100%">

                    <thead>
                        <tr>
                            <th>Nome </th>
                            <th>Descrição </th>
                            <th>Peso </th>
                            <th>Unidade Id </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produto as $produtos)
                            <tr>
                                <td>{{ $produtos->nome }}</td>
                                <td>{{ $produtos->descricao }}</td>
                                <td>{{ $produtos->peso }}</td>
                                <td>{{ $produtos->unidade_id }}</td>
                                <td> <a href="{{ route('produto.show', ['produto' => $produtos->id]) }}"> Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $produtos->id }}"
                                        action="{{ route('produto.destroy', ['produto' => $produtos->id]) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button> -->
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produtos->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produtos->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $produto->appends($request)->links() }}
                <br>
                <!--
                                                                                                           {{ $produto->count() }} - Total de registro por página.
                                                                                                            <br>
                                                                                                            {{ $produto->total() }} - Total de registro da consulta.
                                                                                                            <br>
                                                                                                            {{ $produto->firstItem() }} - Número do primeiro registro da página.(não é o id)
                                                                                                            <br>
                                                                                                            {{ $produto->lastItem() }} - Número do ultimo registro da página.(ultimo na posição)
                                                                                                            -->
                <br>
                Exibindo {{ $produto->count() }} produtos de {{ $produto->total() }}. Começando de
                {{ $produto->firstItem() }} a {{ $produto->lastItem() }}

            </div>

        </div>

    </div>

@endsection
