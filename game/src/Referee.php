<?php

namespace lokothodida\RockPaperScissors;

interface Referee
{
    public function interpret(string $move): Move;
    public function announce(Outcome $outcome): void;
}
