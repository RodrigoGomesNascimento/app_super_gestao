<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
     public function contato(Request $request) {

        // para testar se esta chengando os dados
        //var_dump($_POST);
        //dd($request);
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');

        */
        /*
        //essa éa forma se vc quiser prencer todos os campos
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */
        // forma usando o método fill que traz um array associativo.
        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        */
        //pode ser usado o create, mas o $fillable assim como no fill, tem que estar ativo no model.
        //$contato = new SiteContato();
        //$contato->create($request->all());
        //$contato->save();

        //print_r($contato->getAttributes());
        /*$motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];*/

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' =>'Contato','motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //dd($request);
        //método mais enxuto
        //validação de campos requeridos
       /* $request->validate([
            'nome' => 'required |min:3|max:40|unique:site_contatos',//o |(pipe) separa as regras o ultimo é o parametro unique que tem que passar a tabela
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',

        ],
        [
            'nome.required' => 'O campo nome prescisa ser preenchido!',
            'nome.min' => 'O campo nome tem que ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome só pode ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome informado já está em uso.',
            'telefone.required' => 'O campo telefone precisa ser preenchido.',
            'email' => 'O campo e-mail prescisa conter um e-mail válido.',
            //'motivo_contato.required' => 'O campo do motivo do contato precisa ser preenchido.',
            //'mensagem.required' => 'O campo do mensagem precisa ser preenchido.',
            'mensagem.max' => 'O campo do mensagem so poderá conter 200 caracteres.',

            //se houver muitos campos melhor ir somente pelo método, isso facilita qdo há muitos campos no formulário. Com o : atrribute pode ser
            //recuperado o campo.
            'required' => 'O campo :attribute deve ser preenchido.'
        ]
    );
*/
    //mesma coisa do acima so que com variáveis.
    $regras = [
            'nome' => 'required |min:3|max:40|unique:site_contatos',//o |(pipe) separa as regras o ultimo é o parametro unique que tem que passar a tabela
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',

    ];

    $feedback = [
            'nome.required' => 'O campo nome prescisa ser preenchido!',
            'nome.min' => 'O campo nome tem que ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome só pode ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome informado já está em uso.',
            'telefone.required' => 'O campo telefone precisa ser preenchido.',
            'email' => 'O campo e-mail prescisa conter um e-mail válido.',
            //'motivo_contato.required' => 'O campo do motivo do contato precisa ser preenchido.',
            //'mensagem.required' => 'O campo do mensagem precisa ser preenchido.',
            'mensagem.max' => 'O campo do mensagem so poderá conter 200 caracteres.',

            //se houver muitos campos melhor ir somente pelo método, isso facilita qdo há muitos campos no formulário. Com o : atrribute pode ser
            //recuperado o campo.
            'required' => 'O campo :attribute deve ser preenchido.'
    ];
    $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
