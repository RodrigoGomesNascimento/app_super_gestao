<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //para poder ussar o método fill
    protected $fillable = ['nome','telefone','email','motivo_contatos_id','mensagem',];
}
