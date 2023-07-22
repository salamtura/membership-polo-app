<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'penalty_date' => 'date',
    ];

    public function penaltyCharge(){
        return $this->belongsTo(PenaltyCharge::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function membership(){
        return $this->belongsTo(Membership::class);
    }

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
