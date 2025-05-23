<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'driver_id',
        'conductor_id',
        'amount',
        'date'
    ];

    public function driver() {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function conductor() {
        return $this->belongsTo(User::class, 'conductor_id');
    }

}
