<?php

namespace lokothodida\RockPaperScissorsCli;

final class PseudoRandomNumberGenerator implements RandomNumberGenerator
{
    public function __invoke(int $min, int $max): int
    {
        return rand($min, $max);
    }
}
