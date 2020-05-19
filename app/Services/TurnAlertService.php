<?php

namespace App\Services;

use App\Turn;

class TurnAlertService
{
    public function updateTurn($request)
    {
        $values = json_decode($request->getBody());
        $gameName = $values->value1;
        $playerName = $values->value2;
        $turnNumber = $values->value3;
        $this->newTurn($gameName, $playerName, $turnNumber);
    }

    private function newTurn($gameName, $playerName, $turnNumber)
    {
        $turn = new Turn();
        $turn->game_name = $gameName;
        $turn->player_name = $playerName;
        $turn->turn = $turnNumber;
        $turn->save();
        return $turn;
    }

    public function findLatestTurns()
    {
        $turns = Turn::get();
        $games = $turns->groupBy('game_name');
        $latestTurns = [];
        foreach ($games as $game) {
            $latestTurn = $game->sortByDesc('turn')->first();
            $latestTurns[] = $latestTurn;
        }

        return $latestTurns;
    }
}
