<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentUser extends Model
{
    protected $fillable = [
        'user_id',
        'tournament_id',
    ];
}
