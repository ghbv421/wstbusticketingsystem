<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'contact',
        'latitude',
        'longitude',
        'address',
        'city',
        'state',
        'country'

    ];
}
