<?php

use lokothodida\RockPaperScissors\Moves\Scissors;
use lokothodida\RockPaperScissors\Moves\Paper;
use lokothodida\RockPaperScissors\Moves\Rock;
use PHPUnit\Framework\TestCase;

class ScissorsTest extends TestCase
{
    public function testItBeatsPaper()
    {
        $this->assertTrue((new Scissors())->beats(new Paper()));
    }

    public function testItDoesNotBeatRock()
    {
        $this->assertFalse((new Scissors())->beats(new Rock()));
    }

    public function testItDoesNotBeatScissors()
    {
        $this->assertFalse((new Scissors())->beats(new Scissors()));
    }
}
