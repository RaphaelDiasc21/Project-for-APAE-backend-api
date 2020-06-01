<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $table = 'parceiros';
    public $timestamps = false;

    public function fotos()
    {
        return $this->hasMany('App\Foto','entity_id');
    }
}
