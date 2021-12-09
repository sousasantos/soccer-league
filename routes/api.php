<?php

use App\Services\Soccer;
use App\Services\SyncApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('__', function() {
    $sync = new SyncApi;

    $leagues = (new Soccer)->getLeagues();
    
    foreach ($leagues['data'] as $league) {
        $newLeague = $sync->league($league);
        if (isset($league['seasons']['data'])) {
            $sync->seasons($newLeague, $league['seasons']['data']);
        }
    }
});