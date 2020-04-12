<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carosel extends Model
{
    protected $table = 'carosels';
    public $timestamps = false;

    public function fotos()
    {
        return $this->hasMany('App\Foto','entity_id');
    } 
}
