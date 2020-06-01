<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    public $timestamps = false;

    public function fotos()
    {
        return $this->hasMany('App\Foto','entity_id');
    }
}
