<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'name',
        'type',
        'league_id',
        'season_id'
    ];

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
}
