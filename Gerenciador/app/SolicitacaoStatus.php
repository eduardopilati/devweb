<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoStatus extends Model
{
    protected $table = 'solicitacao_status';
    protected $fillable = ['descricao'];
    
    public function solicitacoes(){
        return $this->hasMany(Solicitacao::class);
    }
}
