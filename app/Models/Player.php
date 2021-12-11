<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'team_id',
        'number',
        'display_name',
        'first_name',
        'last_name',
        'image_path',
        'nationality',
        'position'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
