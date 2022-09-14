<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //

    //necessario pq a tabela tem o nome diferente do que o eloquente busca

    protected $table = 'produto';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
}
