<?php

namespace App\Repositories;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Collection;

class StandingRepository
{
    public function create(Stage $stage, array $standing)
    {
        return $stage->standings()->create([
            'position' => $standing['position'],
            'team_id' => $standing['team_id'],
            'team_name' => $standing['team_name'],
            'stage_id' => $stage->id,
            'games_played' => $standing['overall']['games_played'],
            'won' => $standing['overall']['won'],
            'draw' => $standing['overall']['draw'],
            'lost' => $standing['overall']['lost'],
            'goals_scored' => $standing['overall']['goals_scored'],
            'goals_against' => $standing['overall']['goals_against'],
            'goal_difference' => $standing['total']['goal_difference'],
            'points' => $standing['total']['points']
        ]);
    }

    public function createMany(Stage $stage, array $standings)
    {
        $eloquentCollection = new Collection();
        
        foreach ($standings as $standing) {
            $eloquentCollection->push(
                $this->create($stage, $standing)
            );
        }

        return $eloquentCollection;
    }
}