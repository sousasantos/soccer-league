<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $fillable = [
        'position',
        'team_id',
        'team_name',
        'stage_id',
        'games_played',
        'won',
        'draw',
        'lost',
        'goals_scored',
        'goals_against',
        'goal_difference',
        'points'
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
