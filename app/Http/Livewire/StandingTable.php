<?php

namespace App\Http\Livewire;

use App\Models\Standing;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StandingTable extends DataTableComponent
{
    public $stage_id;

    public bool $showSearch = false;
    public bool $showSorting = false;
    public bool $paginationEnabled = false;
    public bool $singleColumnSorting = true;
    public bool $showPagination = false;

    public function columns(): array
    {
        return [
            Column::make('team_id')
                ->sortable()->hideIf(true),
            Column::make('position')
                ->sortable(),
            Column::make('team', 'team_name')
                ->sortable(),
            Column::make('played', 'games_played')
                ->sortable(),
            Column::make('won')
                ->sortable(),
            Column::make('draw')
                ->sortable(),
            Column::make('lost')
                ->sortable(),
            Column::make('goal', 'goals_scored')
                ->sortable(),
            Column::make('difference', 'goal_difference')
                ->sortable(),
            Column::make('points')
                ->sortable()
        ];
    }

    public function setTableRowAttributes($row): array
    {
        return [
            'wire:click.prevent' => '$emit("teamSelected", ' . $row->team_id . ')'
        ];
    }

    public function getTableRowUrl(): string
    {
        return '#';
    }

    public function query(): Builder
    {
        return Standing::where('stage_id', $this->stage_id);
    }
}
