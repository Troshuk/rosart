<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class OrderStatus extends Model
{
    use OrderableModel;

    public function getOrderField()
    {
        return 'ord';
    }
}
