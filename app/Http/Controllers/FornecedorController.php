<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedor = [
            0=>['nome'=>'Fornecedor 1',
            'status' =>'N',
            'cnpj' =>'00.000.000/000-00'
        ],
                1=>['nome'=>'Fornecedor 2',
            'status' =>'S',

            ]
        ];

        /** Operador ternario de condição.
         * condição ? se verdade : se falso;
         * Condição ? se verdade : (condição ? se verdade : se falso);
         *
         */
        echo isset($fornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        $msg = isset($fornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo ' <br>', $msg;
        return view('app.fornecedor.index', compact('fornecedor'));
    }
}
