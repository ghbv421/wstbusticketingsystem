<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus_table';

    protected $fillable = [
        'bus_type',
        'description',
        'departure_time',
        'arrival_time',
        'driver',
        'conductor',
        'status'
    ];
}
