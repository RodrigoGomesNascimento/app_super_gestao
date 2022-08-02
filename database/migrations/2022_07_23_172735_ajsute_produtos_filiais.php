<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjsuteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a tabela filiais.
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

          //criando a tabela produto_filiais.
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //foreing key (constraints) relacionamentos.

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produto');

        });

        //removendo colunas da tabela produtos.

        Schema::table('produto', function(Blueprint $table){
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //fazer na sequencia inversa.
        //adicionar o que foi removido.
        Schema::table('produto', function(Blueprint $table){

            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        //como as chaves estrangeiras do relaciomanto dizem respeito apenas a tabela produtos filiais é so remover a tabela
        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');

    }
}
