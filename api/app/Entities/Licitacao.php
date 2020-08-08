<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Licitacao extends Eloquent
{
    protected $table = 'licitacao';

    protected $fillable = ['valor', 'valor_realizado', 'codigo', 'orgao_id', 'empresa_id'];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'orgao_id', '_id');
    }

    public function empresa()
    {
        $this->belongsTo(Empresa::class, 'empresa_id', '_id');
    }
}