<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'name',
        'current_season_id',
        'current_round_id',
        'current_stage_id'
    ];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}