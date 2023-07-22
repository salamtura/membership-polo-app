<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inv_number',
        'description',
        'invoice_date',
        'invoice_due_date',
        'invoice_type',
        'payment_ref',
        'payment_mode',
        'remarks',
        'total_amount',
        'status',
        'subscription_id',
        'stable_id',
        'membership_id',
        'penalty_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'payment_date' => 'date',
        'invoice_date' => 'date',
        'invoice_due_date' => 'date',
    ];

    public function membership(){
        return $this->belongsTo(Membership::class);
    }

    public function stable(){
        return $this->belongsTo(Stable::class);
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }

    public function penalty(){
        return $this->belongsTo(Penalty::class);
    }
}
