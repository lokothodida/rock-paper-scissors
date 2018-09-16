<?php

namespace lokothodida\RockPaperScissorsCli;

interface RandomNumberGenerator
{
    public function __invoke(int $min, int $max): int;
}
