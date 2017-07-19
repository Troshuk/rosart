<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blog_category()
    {
        return $this->belongsTo('App\BlogCategory');
    }
}
