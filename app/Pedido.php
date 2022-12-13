<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //relacionamento belongsToMany de muitos para muitos
    public function produtos()
    {
       // return $this->belongsToMany('App\Produto', 'pedido_produtos');
        return $this->belongsToMany('App\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at');
                                                                                        //incluindo mais campos do relacionamento
    }

    /*
         relacionamentos sem que haja os nomes padrões do laravel, tem que  incluir mais doir parametros.
         1 - Modelo do relacionamneot NxN em relaão o Modelo que estamos implementando.
         2 - É a tabela auxiliar que armazena os registros de relacionamento.
         3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento. Que neste caso é 'pedido_id
         4 - Representa o nome da FK  da tabela mapeada pelo model utilizado no relacionamento. Chave que viaja no relacionamento. Que no caso é o produto_id
    */
}
