<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine');
    }
}
