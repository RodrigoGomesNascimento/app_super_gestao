@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="" width="100%">

                    <thead>
                        <tr>
                            <th>Nome </th>
                            <th>Site </th>
                            <th>UF </th>
                            <th>E-mail </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($fornecedor as $fornecedores)
                            <tr>
                                <td>{{ $fornecedores->nome }}</td>
                                <td>{{ $fornecedores->site }}</td>
                                <td>{{ $fornecedores->uf }}</td>
                                <td>{{ $fornecedores->email }}</td>
                                <td> <a href="{{ route('app.fornecedor.excluir', $fornecedores->id) }}"> Excluir</a></td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedores->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $fornecedor->appends($request)->links() }}
                <br>
                <!--
                                                                        {{ $fornecedor->count() }} - Total de registro por página.
                                                                        <br>
                                                                        {{ $fornecedor->total() }} - Total de registro da consulta.
                                                                        <br>
                                                                        {{ $fornecedor->firstItem() }} - Número do primeiro registro da página.(não é o id)
                                                                        <br>
                                                                        {{ $fornecedor->lastItem() }} - Número do ultimo registro da página.(ultimo na posição)
                                                                        -->
                <br>
                Exibindo {{ $fornecedor->count() }} fornecedores de {{ $fornecedor->total() }}. Começando de
                {{ $fornecedor->firstItem() }} a {{ $fornecedor->lastItem() }}

            </div>

        </div>

    </div>

@endsection
