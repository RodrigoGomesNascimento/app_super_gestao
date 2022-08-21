<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedores extends Model
{
    //trait pesquisar
    use SoftDeletes;

    //fornecedores
    protected $table = 'fornecedores';//quando não dá para o eloquent gerar o nome automático. ele sempre sobre põe com esse comando.
    //método estático não precisa da instancia para ser executado no caso não tem que ficar criando objeto.
    protected $fillable = ['nome', 'site', 'uf','email'];

}
