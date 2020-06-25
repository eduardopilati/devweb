<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'tipo'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function filas(){
        return $this->belongsToMany(Fila::class, 'fila_usuarios', 'user_id', 'fila_id');
    }

    public function solicitacoes(){
        return $this->belongsToMany(User::class, 'solicitacao_usuarios', 'user_id', 'solicitacao_id');
    }

    public function atividades(){
        return $this->hasMany(Atividade::class);
    }
}
