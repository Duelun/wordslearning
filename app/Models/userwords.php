<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userwords extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'custom',
        'book',
        'word',
        'wordclass',
        'ipaword',
        'comment',
        'sentences',
        'lang1',
        'meaning',
        'ipameaning',
        'lang2',
        'phaseforeign',
        'phasenumberforeign',
        'delaytoforeign',
        'phaseown',
        'phasenumberown',
        'delaytoown',
        'customdelay',
        'customdelayend',
    ];

    protected $hidden = [
    ];

}
