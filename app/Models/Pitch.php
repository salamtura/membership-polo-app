<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'from_date' => 'datetime',
        'to_date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
