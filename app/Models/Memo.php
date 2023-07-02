<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [

    'name',
    'type',
    'detail',
    'image',
    'buy_date',
    'color',
    'season',
    'brand',
    'group',
    'price',
    ];

}
