<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
