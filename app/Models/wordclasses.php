<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wordclasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'wordclasse',
        'shortform',
    ];

    protected $hidden = [
    ];

}
