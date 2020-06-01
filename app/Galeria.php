<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public $timestamps = false;
    protected $table = 'galeria';

    public function fotos()
    {
        return $this->hasMany('App\Foto','entity_id');
    }
}
