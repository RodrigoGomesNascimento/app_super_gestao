<h3>Fornecedor</h3>
{{-- fica o comentario que será descartado pelo interpretador do blade. E não pode ter espaço entre as chaves e o traços. --}}

{{-- {{ 'Texto de teste' }}assim e abaixo são iguais no blade --}}
{{-- <?= 'Texto de teste;' ?> --}}

@php
// aqui póde ser o nativo do php
/* para múltipos comentários.*/
//echo 'Texto de teste';

/*
    if(isset($varivavel)) {} //retorna true se a variável estiver definidia.
    if(empty($varivavel)) {} //retorna true se a variável estiver vazia.
    -''
    - 0
    - 0.0
    -'0'
    - null
    - false
    - array()
    - $var (atribuida mas sem nenhum valor)

*/
@endphp

{{-- @dd($fornecedor)
@if (count($fornecedor) > 0 && count($fornecedor) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif (count($fornecedor))
    <h3> Existem vários fornecedoes cadasrados</h3>
@else
    <h3> Não existem fornecedor Cadastrado.
@endif --}}
{{-- esse são alguns comandos
    @isset($fornecedor)
    Fornecedor : {{ $fornecedor[0]['nome'] }}
    <br>
    Status: {{ $fornecedor[0]['status'] }}
    @isset($fornecedor[0]['cnpj'])
        CNPJ : {{ $fornecedor[0]['cnpj'] }}
        @empty($fornecedor[0]['cnpj'])
            Vazio
        @endempty
    @endisset

    <br>
    @if ($fornecedor[0]['status'] == 'N')
        Fornecedor inativo
    @endif
    <br>
    @unless($fornecedor[0]['status'] == 'S')
        Fornecedor inativo
    @endunless
@endisset --}}

{{-- comando switch case --}}

{{-- COMO USAR O  @switch($fornecedor[1]['ddd'])
        @case('11')
            São Paulo - SP
        @break

        @case('32')
            Juiz de Fora - MG
        @break

        @case('85')
            Fortaleza - CE
        @break

        @default
            Estado não identificado
    @endswitch
@endisset --}}

{{-- @php $i = 0 @endphp
    @while (isset($fornecedor[$i]))
        Fonecedor : {{ $fornecedor[$i]['nome'] }}
        <br>
        Status: {{ $fornecedor[$i]['status'] }}
        <br>
        CNPJ : {{ $fornecedor[$i]['cnpj'] ?? 'Não declarado' }}
        <br>
        Telefone : ({{ $fornecedor[$i]['ddd'] ?? '' }}) {{ $fonecedor[$i]['telefone'] ?? '' }}
        <hr>
        @php $i++ @endphp
    @endwhile  @dd($loop) mostra os atributos do objeto. --}}

@isset($fornecedor)


    @forelse ($fornecedor as $indice => $fornecedores)
        Iteração atual = {{ $loop->iteration }}
        <br>
        Fonecedor : {{ $fornecedores['nome'] }}
        <br>
        Status: {{ $fornecedores['status'] }}
        <br>
        CNPJ : {{ $fornecedores['cnpj'] ?? 'Não declarado' }}
        <br>
        Telefone : ({{ $fornecedores['ddd'] ?? '' }}) {{ $fornecedores['telefone'] ?? '' }}
        <hr>
        <br>
        @if ($loop->first)
            Primeira iteração do loop.
        @endif

        @if ($loop->last)
            Úlitma iteração do loop.

            <br>
            Total de registro : {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados!!
    @endforelse
    {{-- @for ($i = 0; isset($fornecedor[$i]); $i++)
        Fonecedor : {{ $fornecedor[$i]['nome'] }}
        <br>
        Status: {{ $fornecedor[$i]['status'] }}
        <br>
        CNPJ : {{ $fornecedor[$i]['cnpj'] ?? 'Não declarado' }}
        <br>
        Telefone : ({{ $fornecedor[$i]['ddd'] ?? '' }}) {{ $fonecedor[$i]['telefone'] ?? '' }}
        <hr>
    @endfor
     @foreach ($fornecedor as $indice => $fornecedores)
        Fonecedor : {{ $fornecedores['nome'] }}
        <br>
        Status: {{ $fornecedores['status'] }}
        <br>
        CNPJ : {{ $fornecedores['cnpj'] ?? 'Não declarado' }}
        <br>
        Telefone : ({{ $fornecedores['ddd'] ?? '' }}) {{ $fornecedores['telefone'] ?? '' }}
        <hr>
    @endforeach --}}
@endisset
