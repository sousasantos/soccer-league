<?php

namespace App\Http\Livewire;

use App\Models\League;
use Livewire\Component;

class SelectLeague extends Component
{
    public int $league_id = 0;

    public function updatedLeagueId()
    {
        $this->emit('league-changed', $this->league_id);
    }
    
    public function render()
    {
        return view('livewire.select-league', [
            'leagues' => League::get()
        ]);
    }
}
