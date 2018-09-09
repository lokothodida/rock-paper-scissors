<?php

namespace lokothodida\RockPaperScissors\Gestures;

use lokothodida\RockPaperScissors\Gesture;

final class Paper implements Gesture
{
    public function beats(Gesture $move): bool
    {
        return $move instanceof Rock;
    }
}
