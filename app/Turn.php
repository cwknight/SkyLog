<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [
        'game_name',
        'player_name',
        'turn'
    ];

}
