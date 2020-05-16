<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
   protected $table = 'noticias';
   public $timestamps = false;

   public function fotos()
   {
       return $this->hasMany('App\Foto','entity_id');
   }
}
