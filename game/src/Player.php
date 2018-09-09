<?php

namespace lokothodida\RockPaperScissors;

use lokothodida\RockPaperScissors\Gesture;
use lokothodida\RockPaperScissors\Outcome;

interface Player
{
    public function choose(): Gesture;
    public function accept(Outcome $outcome): void;
}
