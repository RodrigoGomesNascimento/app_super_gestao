<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a tebela filiais.

       //criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //criando a tabela produtos_filiais
        Schema::create('produtos_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //temq que criar os relacionamensot com o foreing
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produto');
        });

        //removendo colunas da tabela produtos
        Schema::table('produto', function(Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //tem que fazer do ultimo evento do up para o posterios. e o inverso
        //adicionar colunas da tabela produtos.
        Schema::table('produto', function(Blueprint $table){
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->decimal('estoque_maximo');


        });

        //como as chaves estrangeiras da tabela produtos_filiais dizem respeito somente a ela, então é so remover a tabela.
        Schema::dropIfExists('produtos_filiais');
        Schema::dropIfExists('filiais');
    }
}
