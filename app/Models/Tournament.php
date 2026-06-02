<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'title',
        'entry_fee',
        'prize_pool',
        'match_time',
        'total_slots',
        'joined_slots',
        'type',
        'description',
    ];
}
