<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('unidade', function (Blueprint $table) {
            $table->id();
            $table->string('inidade', 5);//cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();

        });*/

        //adicionar o relacionamento com a tabela produtos, poderia ser feito uma nova migration, mas pode ser aqui

        Schema::table('produto', function(Blueprint $table){
          //  $table->unsignedBigInteger('unidade_id');
           // $table->foreign('unidade_id')->references('id')->on('unidades');
            });


        //adicionar o relacionamento para muitos na tabela produto_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            //$table->unsignedBigInteger('unidade_id');
           // $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover o que foi feito
            //tem que ser de tras para frente
            //primerio a foregein
            Schema::table('produtos_detalhes', function(Blueprint $table){
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');//nome ordem por convenção [table]_[coluna]_[foreign]
            //remover a coluna
            $table->dropColumn('unidade_id');
        });
         //remover o que foi feito
            //tem que ser de tras para frente
            //primerio a foregein
            Schema::table('produto', function(Blueprint $table){
            $table->dropForeign('produto_unidade_id_foreing');//nome ordem por convenção [table]_[coluna]_[foreign]
            //remover a coluna
            $table->dropColumn('unidade_id');
        });
        Schema::dropIfExists('unidade');
    }
}
