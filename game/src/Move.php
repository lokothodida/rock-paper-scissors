<?php

namespace lokothodida\RockPaperScissors;

interface Move
{
    public function beats(Move $move): bool;
}
