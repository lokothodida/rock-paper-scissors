<?php

namespace lokothodida\RockPaperScissors;

use lokothodida\RockPaperScissors\Outcomes\Player1Wins;
use lokothodida\RockPaperScissors\Outcomes\Player2Wins;
use lokothodida\RockPaperScissors\Outcomes\Tie;

final class Game
{
    private $referee;

    public function __construct(Referee $referee)
    {
        $this->referee = $referee;
    }

    public function play(string $player1Move, string $player2Move): void
    {
        $player1 = $this->referee->interpret($player1Move);
        $player2 = $this->referee->interpret($player2Move);

        if ($player1->beats($player2)) {
            $this->referee->announce(new Player1Wins());
        } elseif ($player2->beats($player1)) {
            $this->referee->announce(new Player2Wins());
        } else {
            $this->referee->announce(new Tie());
        }
    }
}
