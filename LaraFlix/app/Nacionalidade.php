<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nacionalidade extends Model
{
    protected $table = "nacionalidades";
    protected $fillable = ['descricao'];

    public function atores(){
        return $this->HasMany('App\Ator');
    }
}
