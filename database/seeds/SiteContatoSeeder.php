<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11)9999-8888';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Seja bem-vindo ao sitema Super Gestão';
        $contato->save();
        */
        //para usar o método create tem que ir no model e colocar o protect $filleble ([])

        factory(SiteContato::class, 100)->create();
        //\App\Models\SiteContato::factory()->count(100)->create();

    }
}
