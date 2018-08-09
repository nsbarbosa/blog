<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected table = 'post';
    protected $fillable = [ 
        slug, titulo, descricao,id
    ];

    public function Autor(){

        return $this->belongsTo('User','id_autor');
  }
}
