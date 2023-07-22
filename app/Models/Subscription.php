<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'year',
        'amount',
        'subscription_category_id',
        'payment_status',
        'payment_date',
        'remarks',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'payment_date' => 'date',
    ];
    public function membership(){
        return $this->belongsTo(Membership::class);
    }

    public function subscriptionCategory(){
        return $this->belongsTo(SubscriptionCategory::class);
    }

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
