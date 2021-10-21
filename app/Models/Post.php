<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'url', 'category_id'];

    public function getFormattedDate($column, $format = 'd-m-Y H:I:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    //// Function to create "one to many" type dependency with the 'Category' model
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
