<?php

namespace Database\Seeders;

use App\Services\Soccer;
use App\Services\SyncApi;
use Illuminate\Database\Seeder;

class LeagueAndSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sync = new SyncApi;

        $leagues = (new Soccer)->getLeagues();
    
        foreach ($leagues['data'] as $league) {
            $newLeague = $sync->league($league);
            if (isset($league['seasons']['data'])) {
                $sync->seasons($newLeague, $league['seasons']['data']);
            }
        }
    }
}
