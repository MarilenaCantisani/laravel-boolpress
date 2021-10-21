<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //// Function to create "one to many" type dependency with the 'Post' model
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
