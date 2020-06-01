<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    public $timestamps = false;

    public function galeria()
    {
        return $this->belongsTo('App\Galeria');
    }
}
