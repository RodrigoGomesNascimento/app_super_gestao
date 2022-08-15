<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');

        });

        //método statement permite executar uma query no banco de dados.
        //atribuindo os valores de motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //fazendo o relacionamento com a fk e remover a

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contato');
            $table->dropColumn('motivo_contato');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar a coluna motivo_contato e romovendo a fk
       Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');


        });
        //atribuindo os valores de motivo_contato_id para motivo_contatos
        DB::statement('update site_contatos set motivo_contato = motivo_contato_id');

        //remover a motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');

        });
    }
}
