<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'alpha2',
        'alpha3',
        'en',
        'own',
        'active',
    ];

    protected $hidden = [
    ];
}
