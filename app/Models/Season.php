<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'name',
        'is_current_season',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name', 'desc');
        });
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
