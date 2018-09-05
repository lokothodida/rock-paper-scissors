<?php

namespace lokothodida\RockPaperScissorsCli;

use lokothodida\RockPaperScissors\Referee;
use lokothodida\RockPaperScissors\Move;
use lokothodida\RockPaperScissors\Moves\Rock;
use lokothodida\RockPaperScissors\Moves\Paper;
use lokothodida\RockPaperScissors\Moves\Scissors;
use lokothodida\RockPaperScissors\Outcome;
use lokothodida\RockPaperScissors\Outcomes\Player1Wins;
use lokothodida\RockPaperScissors\Outcomes\Player2Wins;
use lokothodida\RockPaperScissors\Outcomes\Tie;
use DomainException;

final class CommandLineReferee implements Referee
{
	public function interpret(string $move): Move
	{
		switch ($move) {
			case 'R': return new Rock();
			case 'P': return new Paper();
			case 'S': return new Scissors();
			default:  return $this->interpret(readline('Rock (R), paper (P) or scissors (S)? '));
		}
	}

	public function announce(Outcome $outcome): void
	{
		switch ($outcome) {
			case (new Player1Wins()):
				echo "You win!\n";
				break;
			case (new Player2Wins()):
				echo "You lose!\n";
				break;
			case (new Tie()):
				echo "Tied!\n";
				break;
		}
	}
}
