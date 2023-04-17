<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waterlevel extends Model
{
    use HasFactory;
    protected $fillable=[
        'waterlevel',
        'day'
    ];

    
}
