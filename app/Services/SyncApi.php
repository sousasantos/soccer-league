<?php

namespace App\Services;

use App\Models\League;
use App\Models\Team;

class SyncApi
{
    public function seasons(League $league, array $seasons)
    {
        foreach ($seasons as $season) {
            $league->seasons()->updateOrCreate(
                ['id' => $season['id']],
                $season
            );
        }
        return $league->fresh();
    }

    public function league(array $league)
    {
        return League::updateOrCreate(['id' => $league['id']], $league);
    }

    public function teams(array $teams)
    {
        return Team::createMany($teams);
    }

    public function players(Team $team, array $players)
    {
        return $team->players()->createMany($players);
    }
}