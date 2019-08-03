<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Orgao extends Eloquent
{
    protected $table = 'orgao';

    protected $fillable = ['nome'];

    public function licitacoes()
    {
        $this->belongsTo(Licitacao::class, 'orgao_id', 'id');
    }
}