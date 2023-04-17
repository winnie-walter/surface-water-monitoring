<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flowrate extends Model
{
    use HasFactory;
    protected $fillable=[
        'flowrate',
        'day'
    ];
}
