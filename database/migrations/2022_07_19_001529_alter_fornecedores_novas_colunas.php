<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //O método table seleciona a tabela.
         Schema::table('fornecedores', function (Blueprint $table) {
           // $table->string('uf', 2);
           // $table->string('email', 150);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //O método down é para desfazer o que foi feitoi pelo up
         //O método table seleciona a tabela.
         Schema::table('fornecedores', function (Blueprint $table) {
            //para remover colunas usa o metodo drop pode-se removeru uma a uma a coluna ou po array
            //$table->dropColumn('uf');
            //$table->dropColumn('email');
            $table->dropColumn(['uf', 'email']);

        });
    }
}
