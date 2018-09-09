<?php

use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Scissors;
use PHPUnit\Framework\TestCase;

class PaperTest extends TestCase
{
    public function testItBeatsRock()
    {
        $this->assertTrue((new Paper())->beats(new Rock()));
    }

    public function testItDoesNotBeatScissors()
    {
        $this->assertFalse((new Paper())->beats(new Scissors()));
    }

    public function testItDoesNotBeatPaper()
    {
        $this->assertFalse((new Paper())->beats(new Paper()));
    }
}
