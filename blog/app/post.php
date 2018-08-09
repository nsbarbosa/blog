<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable = [ 
        slug, titulo, descricao,id,
    ];

    protected table = 'post';
    public function Autor(){

        return $this->belongsTo('User','id_autor');
  }
}
