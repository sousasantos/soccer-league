<?php

namespace App\Repositories;

use App\Models\Team;
use App\Services\Soccer;

class TeamRepository
{
    public function find($team_id)
    {
        $team = Team::find($team_id);

        if (!$team) {
            $teamFromApi = (new Soccer)->getTeam($team_id);

            $team = $this->create($teamFromApi['data']);

           if (isset($teamFromApi['data']['squad']['data'])) {
            
                (new PlayerRepository)->createMany(
                    $team,
                    $teamFromApi['data']['squad']['data']
                );
           } 
        }
        
        return $team->refresh();
    }

    public function create(array $team)
    {
        return Team::create([
            'id' => $team['id'],
            'name' => $team['name'],
            'logo_path' => $team['logo_path']
        ]);
    }
}