<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'pedido_produtos';
    protected $fillable = ['pedido_id', 'produto_id', 'created_at', 'update_at', 'quantidade'];
}
