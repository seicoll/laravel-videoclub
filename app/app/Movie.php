<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    
    
    /*
    * Get the reviews for the movie.
    */
    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }
    
}
