<?php

namespace lokothodida\RockPaperScissorsCli;

use lokothodida\RockPaperScissors\Player;
use lokothodida\RockPaperScissors\Gesture;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Scissors;
use lokothodida\RockPaperScissors\Outcome;
use lokothodida\RockPaperScissors\Outcomes\Win;
use lokothodida\RockPaperScissors\Outcomes\Loss;
use lokothodida\RockPaperScissors\Outcomes\Tie;
use Exception;

final class CommandLinePlayer implements Player
{
    private $commandLine;

    public function __construct(CommandLine $commandLine)
    {
        $this->commandLine = $commandLine;
    }

    public function choose(): Gesture
    {
        switch ($this->commandLine->readLine('Select a move (R, P, S) > ')) {
            case 'R': return new Rock();
            case 'P': return new Paper();
            case 'S': return new Scissors();
            default: return $this->choose();
        }
    }

    public function accept(Outcome $outcome): void
    {
        if ($outcome instanceof Win) {
            $this->commandLine->writeLine("You win!");
        } elseif ($outcome instanceof Loss) {
            $this->commandLine->writeLine("You lose!");
        } elseif ($outcome instanceof Tie) {
            $this->commandLine->writeLine("Tie!");
        } else {
            throw new Exception("Outcome not recognised");
        }
    }
}
