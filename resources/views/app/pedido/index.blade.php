@extends('app.layouts.basico')
@section('titulo', 'pedido')
@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <!--{{ $pedidos->toJson() }}-->
                <table border="" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th> Cliente </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar
                                        Produto</a></td>
                                <td> <a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}"> Visualizar</a>
                                </td>

                                <td>
                                    <form id="form_{{ $pedido->id }}"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button> -->
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $pedidos->appends($request)->links() }}
                <br>
                <!--    <br>
                                                                                                     {{ $pedidos->total() }} - Total de registro da consulta.
                                                                                                     <br>
                                                                                                    {{ $pedidos->firstItem() }} - Número do primeiro registro da página.(não é o id
                                                                                                    <br>
                                                                                                   {{ $pedidos->lastItem() }} - Número do ultimo registro da página.(ultimo na posição)-->
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }}. Começando de
                {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }}

            </div>

        </div>

    </div>
@endsection
