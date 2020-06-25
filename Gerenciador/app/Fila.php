<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    protected $table = 'filas';
    protected $fillable = ['titulo', 'descricao'];

    public function responsaveis(){
        return $this->belongsToMany(User::class, 'fila_usuarios', 'fila_id', 'user_id');
    }

    public function solicitacoes(){
        return $this->hasMany(Solicitacao::class);
    }
}
