<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
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

    // public function getDateAttribute() {
    //     return Carbon::createFromFormat('Y-m-d', $this->attribute[])
    // }
}

