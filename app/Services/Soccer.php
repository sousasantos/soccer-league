<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Soccer
{
    private string $url;
    private string $key;

    public function __construct()
    {
       $this->url = env('SOCCER_API_URL');
       $this->key = env('SOCCER_API_KEY');
    }

    /**
     * return team info with players
     *
     * @param integer $team_id
     * 
     * @return array
     */
    public function getTeam(int $team_id):array
    {
        return $this->request(
            'teams/' . $team_id,
            'squad.player.position'
        )->json();
    }

    /**
     * return teams by season with players
     *
     * @param integer $team_id
     * 
     * @return array
     */
    public function getTeamsBySeason(int $season_id):array
    {
        return $this->request(
            'teams/seasons/' . $season_id,
            'squad.player.position'
        )->json();
    }

    /**
     * return stages by seasons
     *
     * @param integer $season_id
     * 
     * @return array
     */
    public function getStagesBySeason(int $season_id):array
    {
        return $this->request(
            'standings/season/' . $season_id
        )->json();
    }

    /**
     * return leagues with all seasons
     *
     * @return array
     */
    public function getLeagues():array
    {
        return $this->request(
            'leagues/',
            'seasons'
        )->json();
    }

    private function request(string $endpoint, string $includes = null)
    {
        return Http::get($this->url . $endpoint, [
            'api_token' => $this->key,
            'include' => $includes
        ]);
    }
}
