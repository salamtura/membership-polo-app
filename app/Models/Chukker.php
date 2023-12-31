<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chukker extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'chukker_date' => 'date',
        'closing_time' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chukkerBooking(){
        return $this->hasMany(ChukkerBooking::class);
    }
}
