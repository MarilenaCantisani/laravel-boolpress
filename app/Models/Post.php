<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //// Add the fillable fields
    protected $fillable = ['title', 'content', 'slug', 'url', 'category_id'];

    //// Add function to format the date that will arrive from the database
    public function getFormattedDate($column, $format = 'd-m-Y')
    {
        return Carbon::create($this->$column)->format($format);
    }

    //// Function to create "one to many" type dependency with the 'Category' model
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //// Function to create "many to many" type dependency with the 'Tag' model
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
