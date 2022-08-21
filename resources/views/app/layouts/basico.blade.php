<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield ('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    {{-- cria o menu em todas a paginas que extend o basico. --}}
    @include('app.layouts._partials.topo')
    {{-- PARA IMPRIMIR A SEÇÃO NO LOCAL CERTO. --}}
    @yield('conteudo')

</body>

</html>
