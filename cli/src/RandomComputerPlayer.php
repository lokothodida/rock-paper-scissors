<?php

namespace lokothodida\RockPaperScissorsCli;

use lokothodida\RockPaperScissors\Player;
use lokothodida\RockPaperScissors\Gesture;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Scissors;
use lokothodida\RockPaperScissors\Outcome;

final class RandomComputerPlayer implements Player
{
	public function choose(): Gesture
	{
		switch (rand(1, 3)) {
			case 1: return new Rock();
			case 2: return new Paper();
			case 3: return new Scissors();
		}
	}

	public function accept(Outcome $outcome): void
	{
	}
}
