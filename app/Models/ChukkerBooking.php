<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChukkerBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'chukker_number',
        'mounts',
        'status',
        'preference',
        'chukker_id',
        'membership_id',
        'userid_id',
    ];

    public function membership(){
        return $this->belongsTo(Membership::class);
    }
}
