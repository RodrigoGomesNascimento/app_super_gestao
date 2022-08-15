<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);//cm, mm, kg
            $table->string('descricao', 30);//qual é a unidade.
            $table->timestamps();
        });

        //adicionar o relaciomento com a tabela produtos
        Schema::table('produto', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

           //adicionar o relaciomento com a tablea produtos_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover é de forma inversa a inserção.
        //primeiro a fk depois a coluna
        Schema::table('produtos_detalhes',function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');//o nome é dado por [table]_[coluna]_foreign
            //remover a coluna

            $table->dropColumn('unidade_id');

        });

         Schema::table('produto', function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produto_unidade_id_foreign');//o nome é dado por [table]_[coluna]_foreign
            //remover a coluna

            $table->dropColumn('unidade_id');

        });

        Schema::dropIfExists('unidades');
    }
}
