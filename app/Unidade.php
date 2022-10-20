<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    //tem que colocar o $fillable para poder preencher em massa.
    protected $fillable = ['unidade', 'descricao'];
}
