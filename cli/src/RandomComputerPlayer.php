<?php

namespace lokothodida\RockPaperScissorsCli;

use lokothodida\RockPaperScissors\Player;
use lokothodida\RockPaperScissors\Gesture;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Scissors;
use lokothodida\RockPaperScissors\Outcome;
use Exception;

final class RandomComputerPlayer implements Player
{
    private $random;

    public function __construct(RandomNumberGenerator $random)
    {
        $this->random = $random;
    }

    public function choose(): Gesture
    {
        $random = $this->random;

        switch ($random(1, 3)) {
            case 1:  return new Rock();
            case 2:  return new Paper();
            case 3:  return new Scissors();
            default: throw new Exception('Not recognised');
        }
    }

    public function accept(Outcome $outcome): void
    {
    }
}
