<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'display_name',
        'position'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
