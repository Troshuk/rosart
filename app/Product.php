<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasTechnique;
    use HasCategory;
}
