<?php

namespace App\Repositories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository
{
    public function create(Team $team, array $player)
    {
        return Player::updateOrCreate(['id' => $player['player_id']],[
            'id' => $player['player_id'],
            'team_id' => $team->id,
            'number' => $player['number'] ?? null,
            'display_name' => $player['player']['data']['display_name'],
            'first_name' => $player['player']['data']['firstname'],
            'last_name' => $player['player']['data']['lastname'],
            'image_path' => $player['player']['data']['image_path'],
            'nationality' => $player['player']['data']['nationality'],
            'position' => optional($player['player']['data'])['position']['data']['name'] ?? null 
        ]);
    }

    public function createMany(Team $team, array $players)
    {
        $eloquentCollection = new Collection();
        
        foreach ($players as $palyer) {
            $eloquentCollection->push(
                $this->create($team, $palyer)
            );
        }

        return $eloquentCollection;
    }
}