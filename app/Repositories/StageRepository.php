<?php

namespace App\Repositories;

use App\Models\Season;
use App\Models\Stage;
use App\Services\Soccer;
use Illuminate\Database\Eloquent\Collection;

class StageRepository
{
    public function getBySeason(Season $season)
    {
        if ($season->stages->isEmpty()) {
            $stagesFromApi = (new Soccer)->getStagesBySeason($season->id);

            foreach($stagesFromApi['data'] as $stageFromApi) {
                $stage = $this->create($stageFromApi);

                if (optional($stageFromApi['standings'])['data']) {
                    (new StandingRepository)->createMany(
                        $stage,
                        $stageFromApi['standings']['data']
                    );
                }
            }            
        }

        return $season->refresh()->stages;
    }

    public function create(array $stage)
    {
        return Stage::create([
            'id' => $stage['id'],
            'name' => $stage['name'],
            'type' => $stage['type'],
            'league_id' => $stage['league_id'],
            'season_id' => $stage['season_id']
        ]);
    }

    public function createMany(array $stages)
    {
        $eloquentCollection = new Collection();
        
        foreach ($stages as $stage) {
            $eloquentCollection->push($this->create($stage));
        }

        return $eloquentCollection;
    }
}
