<?php

namespace lokothodida\RockPaperScissors;

interface Gesture
{
    public function beats(Gesture $move): bool;
}
