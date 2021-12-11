<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'name',
        'logo_path'
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
