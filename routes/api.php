<?php

use App\Models\Standing;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('__', function() {
    Standing::query()->delete();
    return Team::find('734');
});