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
    //para mostrar os pedidos na tela da relação de produto na view index

    public function pedidos() {
        return $this->belongsToMany('App\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id');
    }
    /*
        3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento.
        4 - Representa o da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando.
    */
}
