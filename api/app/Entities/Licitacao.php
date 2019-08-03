<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Licitacao extends Eloquent
{
    protected $fillable = ['valor', 'codigo'];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'orgao_id', 'id');
    }

    public function empresa()
    {
        $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}