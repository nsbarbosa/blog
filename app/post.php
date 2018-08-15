<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class post extends Model
{
    //
    use Searchable;

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

    public function toSearchableArray()
    {
      /**
       * Load the categories relation so that it's available
       *  in the laravel toArray method
       */
      $this->categories;
    
      return $this->toArray();
    }
}
