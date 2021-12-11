<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Repositories\TeamRepository;
use Livewire\Component;

class TeamModal extends Component
{
    public Team $team;

    protected $listeners = [
        'teamSelected'
    ];

    public function teamSelected(TeamRepository $teamRepository, $team_id)
    {
        $this->team = $teamRepository->find($team_id);

        $this->emit('findTeam');
    }

    public function render()
    {
        return view('livewire.team-modal');
    }
}
