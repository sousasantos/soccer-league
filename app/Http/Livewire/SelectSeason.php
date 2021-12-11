<?php

namespace App\Http\Livewire;

use App\Models\League;
use Livewire\Component;

class SelectSeason extends Component
{
    public League $league;
    public int $season_id = 0;

    protected $listeners = [
        'league-changed' => 'leagueChanged'
    ];

    public function updatedSeasonId()
    {
        $this->emit('season-changed', $this->season_id);
    }

    public function leagueChanged($league_id)
    {
        $this->league = League::findOrNew($league_id);
    }

    public function mount()
    {
        $this->league = new League;
    }

    public function render()
    {
        return view('livewire.select-season', [
            'seasons' => $this->league->seasons
        ]);
    }
}
