<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userbooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'langforeign',
        'langown',
    ];

    protected $hidden = [
    ];

}
