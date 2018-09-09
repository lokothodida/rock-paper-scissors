<?php

use lokothodida\RockPaperScissors\Gestures\Scissors;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Rock;
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
