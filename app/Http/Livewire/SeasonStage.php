<?php

namespace App\Http\Livewire;

use App\Models\Season;
use App\Repositories\StageRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SeasonStage extends Component
{
    public Collection $stages;

    protected $listeners = [
        'season-changed' => 'seasonChanged',
        'league-changed' => 'leagueChanged'
    ];

    public function leagueChanged()
    {
        $this->stages = new Collection();
    }

    public function seasonChanged(StageRepository $stageRepository, $season_id)
    {
        $season = Season::find($season_id);
        
        if ($season) {
            $this->stages = $stageRepository->getBySeason($season);
        }
    }

    public function render()
    {
        return view('livewire.season-stage');
    }
}
