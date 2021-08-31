<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'car',
        'distance',
        'cost',
        'damage',
        'damageImage',
        'body'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

