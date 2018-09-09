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
	public function choose(): Gesture
	{
		switch (readline('Select a move (R, P, S) > ')) {
			case 'R': return new Rock();
			case 'P': return new Paper();
			case 'S': return new Scissors();
			default: return $this->choose();
		}
	}

	public function accept(Outcome $outcome): void
	{
	    if ($outcome instanceof Win) {
            echo "You win!\n";
	    } elseif ($outcome instanceof Loss) {
	        echo "You lose!\n";
	    } elseif ($outcome instanceof Tie) {
	        echo "Tie!\n";
	    } else {
	        throw Exception("Outcome not recognised");
	    }
	}
}
