<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
        'image',
        'color',
        'season',
        'brand',
        'price',
        'created_at',
        'updated_at'
    ];
}
