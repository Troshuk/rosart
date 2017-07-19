<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class Category extends Model
{
    use OrderableModel;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getOrderField()
    {
        return 'ord';
    }
}