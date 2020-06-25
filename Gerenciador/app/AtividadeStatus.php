<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtividadeStatus extends Model
{
    protected $table = 'atividade_status';
    protected $fillable = ['descricao'];
    
    public function atividades(){
        return $this->hasMany(Atividade::class);
    }
}
