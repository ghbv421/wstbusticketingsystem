<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus_table';

    protected $fillable = [
        'bus_type',
        'capacity',
        'departure_time',
        'arrival_time',
        'driver_id',
        'conductor_id',
        'status'
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function conductor()
    {
        return $this->belongsTo(User::class, 'conductor_id');
    }
}
