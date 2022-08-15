<?php

use Illuminate\Database\Seeder;
use App\Fornecedores;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedores();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor100@contato.com.br';
        $fornecedor->save();

        //o metodo create (atenção para o atributo fillable da classe model)
        Fornecedores::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor200@contato.com.br',
        ]);

        //método insert.

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'fornecedor300@contato.com.br',
        ]);

    }
}
