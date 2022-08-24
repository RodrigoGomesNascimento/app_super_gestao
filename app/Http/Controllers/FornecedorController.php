<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedores;

class FornecedorController extends Controller
{

    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        //dd($request->all());

        //busca por varios parametros.
        $fornecedor = Fornecedores::where('nome', 'like','%'.$request->input('nome').'%')
                                    ->where('site', 'like','%'.$request->input('site').'%')
                                    ->where('uf', 'like','%'.$request->input('uf').'%')
                                    ->where('email', 'like','%'.$request->input('email').'%')
                                    ->get();
        //dd($fornecedor);

        return view('app.fornecedor.listar', ['fornecedor' => $fornecedor]);//esse últmo é o parametro que será passado para a view.
    }

    public function adicionar(Request $request){

        //mensagem de sucesso
        $msg = '';//tem que ser iniciada antes do if

        //print_r($request->all());

       //validando com o token para entrar na tela de cadastro

       if($request->input('_token') != ''){
        //echo 'Cadastro';



            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];
            $feedback = [
                'required' => ' O Campo :attribute deve ser preenchido',//o :atrribute recupera o campo
                'nome.min' => 'O campo nome dever ter no mínimo 3 caracters',
                'nome.max' => 'O campo nome dever ter no máximo 40 caracters',
                'uf.min' => 'O campo uf dever ter no mínimo 3 caracters',
                'uf.max' => 'O campo uf dever ter no máximo 40 caracters',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'

            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedores();
            $fornecedor->create($request->all());

            //$msg = 'Cadastro realizado com sucesso';
            //echo 'Chegamos';

            $msg = 'Cadastro realizado com sucesso';

       }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    /*public function index(){
        $fornecedor = [
            0=>['nome'=>'Fornecedor 1',
            'status' =>'N',
            'cnpj' =>'00.000.000/000-00',
            'ddd' => '11', //Sao Paulo (SP)
            'telefone' => '0000-0000'
            ],
                1=>['nome'=>'Fornecedor 2',
                    'status' =>'S',
                    'cnpj' => null,
                    'ddd' => '85', //Fortaleza (CE)
                    'telefone' => '0000-0000'
            ],
                2=>['nome'=>'Fornecedor 3',
                    'status' =>'S',
                    'cnpj' => null,
                    'ddd' => '32',//Juiz de Fora (MG)
                    'telefone' => '0000-0000'
            ]
        ];

        /** Operador ternario de condição.
         * condição ? se verdade : se falso;
         * Condição ? se verdade : (condição ? se verdade : se falso);
         *
         */
        /*echo isset($fornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        $msg = isset($fornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo ' <br>', $msg;
        return view('app.fornecedor.index', compact('fornecedor'));
    } */

}
