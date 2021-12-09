<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'name',
        'is_current_season',
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }
}
