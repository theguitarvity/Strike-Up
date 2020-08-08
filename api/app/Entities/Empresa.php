<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Empresa extends Eloquent
{
    protected $table = 'empresa';

    protected $fillable = ['razao_social', 'cnpj', 'dados'];
    
    public function licitacoes()
    {
        return $this->hasMany(Licitacao::class, 'licitacao_id', '_id');
    }
}