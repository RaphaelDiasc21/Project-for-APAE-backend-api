<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carosel extends Model
{
    protected $table = 'carosel';
    public $timestamps = false;

    public function fotos()
    {
        return $this->hasMany('App\Foto','entity_id');
    } 
}
