<?php

namespace lokothodida\RockPaperScissors;

use lokothodida\RockPaperScissors\Outcomes\Win;
use lokothodida\RockPaperScissors\Outcomes\Loss;
use lokothodida\RockPaperScissors\Outcomes\Tie;

final class Game
{
    private $player1;
    private $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function play(): void
    {
        $player1 = $this->player1->choose();
        $player2 = $this->player2->choose();

        if ($player1->beats($player2)) {
            $this->player1->accept(new Win());
            $this->player2->accept(new Loss());
        } elseif ($player2->beats($player1)) {
            $this->player1->accept(new Loss());
            $this->player2->accept(new Win());
        } else {
            $this->player1->accept(new Tie());
            $this->player2->accept(new Tie());
        }
    }
}
