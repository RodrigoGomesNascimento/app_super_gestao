<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //

    //necessario pq a tabela tem o nome diferente do que o eloquente busca

    protected $table = 'produto';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //relacionamento hasone um para um

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');

        /*Produto tem 1 produtoDetalhe
        1 registro relacionado em  produto_detalhes (fk) -> produto_id
        produtos (pk) ->id */
    }
}
