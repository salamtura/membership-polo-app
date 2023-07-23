<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function documentCategory(){
        return $this->belongsTo(DocumentCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
