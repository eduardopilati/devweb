<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacoes';
    protected $fillable = ['titulo', 'descricao', 'prioridade', 'solicitante', 'email_solicitante', 'fila_id', 'solicitacao_status_id'];

    public function fila(){
        return $this->belongsTo(Fila::class);
    }

    public function solicitacaoStatus(){
        return $this->belongsTo(SolicitacaoStatus::class);
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'solicitacao_usuarios', 'solicitacao_id', 'user_id');
    }

    public function atividades(){
        return $this->hasMany(Atividade::class);
    }
}
