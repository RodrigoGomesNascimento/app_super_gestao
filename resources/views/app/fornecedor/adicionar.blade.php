@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Fornecedor - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        {{ $msg }}

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action=" {{route('app.fornecedor.adicionar')}}" method="post">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : ""}}

                    <input type="text" name="site" class="borda-preta" placeholder="Site" value="{{ old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : ""}}

                    <input type="text" name="uf" class="borda-preta" placeholder="UF" value="{{ old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : ""}}

                    <input type="text" name="email" class="borda-preta" placeholder="E-mail" value="{{ old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : ""}}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
        </div>
    </div>

</div>

@endsection
