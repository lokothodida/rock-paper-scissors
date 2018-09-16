<?php

use PHPUnit\Framework\TestCase;
use lokothodida\RockPaperScissorsCli\RandomComputerPlayer;
use lokothodida\RockPaperScissorsCli\RandomNumberGenerator;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Scissors;

final class RandomComputerPlayerTest extends TestCase
{
    public function testChoosing1MeansChoosingRock()
    {
        $cpu = new RandomComputerPlayer(new FixedNumberGenerator(1));

        $this->assertEquals(new Rock(), $cpu->choose());
    }

    public function testChoosing2MeansChoosingPaper()
    {
        $cpu = new RandomComputerPlayer(new FixedNumberGenerator(2));

        $this->assertEquals(new Paper(), $cpu->choose());
    }

    public function testChoosing3MeansChoosingScissors()
    {
        $cpu = new RandomComputerPlayer(new FixedNumberGenerator(3));

        $this->assertEquals(new Scissors(), $cpu->choose());
    }

    /**
     * @dataProvider invalidChoices
     * @expectedException Exception
     */
    public function testChoosingOtherNumbersErrors($number)
    {
        $cpu = new RandomComputerPlayer(new FixedNumberGenerator($number));
        $cpu->choose();
    }

    public function invalidChoices(): array
    {
        return [
            '-36' => [-36],
            '0' => [0],
            '4' => [4],
            '50' => [50]
        ];
    }
}

final class FixedNumberGenerator implements RandomNumberGenerator
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function __invoke(int $min, int $max): int
    {
        return $this->number;
    }
}
