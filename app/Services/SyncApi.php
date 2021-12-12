<?php

namespace App\Services;

use App\Models\League;
use App\Models\Season;

class SyncApi
{
    public function seasons(League $league, array $seasons)
    {
        foreach ($seasons as $season) {
            $league->seasons()->updateOrCreate(
                ['id' => $season['id']],
                array_filter($season, function($index, $key) {
                    return in_array($key, (new Season())->getFillable());
                }, ARRAY_FILTER_USE_BOTH)
            );
        }
        return $league->fresh();
    }

    public function league(array $league)
    {
        $filterLeague = array_filter($league, function($index, $key) {
            return in_array($key, (new League())->getFillable());
        }, ARRAY_FILTER_USE_BOTH);

        return League::updateOrCreate(['id' => $filterLeague['id']], $filterLeague);
    }
}