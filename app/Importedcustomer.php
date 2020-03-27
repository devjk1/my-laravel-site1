<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Importedcustomer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];
}
