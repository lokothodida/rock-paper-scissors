<?php

namespace lokothodida\RockPaperScissors;

interface Referee
{
    public function interpret(string $move): Gesture;
    public function announce(Outcome $outcome): void;
}
