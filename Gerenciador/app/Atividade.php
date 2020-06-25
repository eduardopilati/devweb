<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividades';
    protected $fillable = ['titulo', 'tempo_trabalhado', 'solicitacao_id', 'user_id', 'atividade_status_id'];

    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function atividadeStatus(){
        return $this->belongsTo(AtividadeStatus::class);
    }
}
