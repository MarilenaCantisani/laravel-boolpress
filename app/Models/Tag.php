<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //// Function to create "many to many" type dependency with the 'Post' model
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
