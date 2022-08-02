<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    //tem que definir o table para não dar erro no tinker.
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];// autorização para poder usar o metodo create

}
