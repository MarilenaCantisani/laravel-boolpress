<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'url'];
    public function getFormattedDate($column, $format = 'd-m-Y H:I:s')
    {
        return Carbon::create($this->$column)->format($format);
    }
}
