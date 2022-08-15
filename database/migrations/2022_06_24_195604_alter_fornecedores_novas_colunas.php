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
        //copiar e colar o que está em up da tabela a qual vai aumentar as colunas e mudar o metodo create para table
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf',2);
            $table->string('email',150);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Desfaz o que o up fez
        Schema::table('fornecedores', function (Blueprint $table) {
            //$table->dropColumn('uf',2);
            //$table->dropColumn(['uf', 'email']);// tanto uma coluna como um array de colunas.
        });
    }
}
