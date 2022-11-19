<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    //necessario pq a tabela tem o nome diferente do que o eloquente busca

    protected $table = 'produto';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    //relacionamento hasone um para um

    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');//não vai usar a convenção de nome.

        /*Produto tem 1 produtoDetalhe
        1 registro relacionado em  produto_detalhes (fk) -> produto_id
        produtos (pk) ->id */
    }

    public function fornecedor() {
        return $this->belongsTo('App\Fornecedores');
    }
}
