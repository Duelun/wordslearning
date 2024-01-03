<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class learnphases extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minrepait',
        'maxrepait',
        'nextphase',
        'nextdelayday',
        'errorbackdrop',
        'backdelayday',
    ];

    protected $hidden = [
    ];

    public $incrementing = false;
}
