<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'bus_type',
        'from_terminal_id',
        'destination_terminal_id',
        'departure',
        'arrival',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // app/Models/Dispatcher.php

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
    

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function fromTerminal()
    {
        return $this->belongsTo(Terminal::class, 'from_terminal_id');
    }

    public function destinationTerminal()
    {
        return $this->belongsTo(Terminal::class, 'destination_terminal_id');
    }


}
