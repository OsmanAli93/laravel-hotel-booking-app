<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_token',
        'check_in',
        'check_out',
        'room_qty',
        'total_nights',
        'amount'
    ];

    public function user () 
    {
        return $this->belongsTo(User::class);
    }


}
