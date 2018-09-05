<?php

namespace lokothodida\RockPaperScissors\Moves;

use lokothodida\RockPaperScissors\Move;

final class Rock implements Move
{
    public function beats(Move $move): bool
    {
        return $move instanceof Scissors;
    }
}
