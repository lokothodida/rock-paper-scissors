<?php

use lokothodida\RockPaperScissors\Moves\Rock;
use lokothodida\RockPaperScissors\Moves\Scissors;
use lokothodida\RockPaperScissors\Moves\Paper;
use PHPUnit\Framework\TestCase;

class RockTest extends TestCase
{
    public function testItBeatsScissors()
    {
        $this->assertTrue((new Rock())->beats(new Scissors()));
    }

    public function testItDoesNotBeatPaper()
    {
        $this->assertFalse((new Rock())->beats(new Paper()));
    }

    public function testItDoesNotBeatRock()
    {
        $this->assertFalse((new Rock())->beats(new Rock()));
    }
}
