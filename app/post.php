<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable = [ 
        'slug', 'titulo', 'descricao','id',
    ];

    public function Autor(){

        return $this->belongsTo('User','id_autor');
  }

  /**
 * Get the route key for the model.
 *
 * @return string
 */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
