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

@isset($fornecedor)
    Fonecedor : {{ $fornecedor[1]['nome'] }}
    <br>
    Status: {{ $fornecedor[1]['status'] }}
    <br>
    CNPJ : {{ $fornecedor[1]['cnpj'] ?? '' }}
    <br>
    Telefone : ({{ $fornecedor[1]['ddd'] ?? '' }}) {{ $fonecedor[1]['telefone'] ?? '' }}
    @switch($fornecedor[1]['ddd'])
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
@endisset
