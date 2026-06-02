<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'tournament_id',
        'user_id',
        'kills',
        'is_winner',
    ];
}
