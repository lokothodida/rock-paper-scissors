<?php

use lokothodida\RockPaperScissors\Game;
use lokothodida\RockPaperScissors\Player;
use lokothodida\RockPaperScissors\Gesture;
use lokothodida\RockPaperScissors\Outcome;
use lokothodida\RockPaperScissors\Outcomes\Win;
use lokothodida\RockPaperScissors\Outcomes\Loss;
use lokothodida\RockPaperScissors\Outcomes\Tie;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testWhenPlayer1sMoveBeatsPlayer2sMoveThenPlayer1WinsAndPlayer2Loses()
    {
        $game = new Game($player1 = new MockPlayer(true), $player2 = new MockPlayer(false));
        $game->play();
        $this->assertEquals(new Win(), $player1->lastOutcome());
        $this->assertEquals(new Loss(), $player2->lastOutcome());
    }

    public function testWhenPlayer2sMoveBeatsPlayer1sMoveThenPlayer2WinsAndPlayer1Loses()
    {
        $game = new Game($player1 = new MockPlayer(false), $player2 = new MockPlayer(true));
        $game->play();
        $this->assertEquals(new Loss(), $player1->lastOutcome());
        $this->assertEquals(new Win(), $player2->lastOutcome());
    }

    public function testWhenNeitherPlayerBeatsTheOtherThenItIsATie()
    {
        $game = new Game($player1 = new MockPlayer(false), $player2 = new MockPlayer(false));
        $game->play();
        $this->assertEquals(new Tie(), $player1->lastOutcome());
        $this->assertEquals(new Tie(), $player2->lastOutcome());
    }
}

class MockPlayer implements Player
{
    private $isWinner;
    private $outcome;

    public function __construct($isWinner)
    {
        $this->isWinner = $isWinner;
    }

    public function choose(): Gesture
    {
        return new class($this->isWinner) implements Gesture {
            private $isWinner;

            public function __construct($isWinner) {
                $this->isWinner = $isWinner;
            }

            public function beats(Gesture $move): bool
            {
                return $this->isWinner;
            }
        };
    }

    public function accept(Outcome $outcome): void
    {
        $this->outcome = $outcome;
    }

    public function lastOutcome(): Outcome
    {
        return $this->outcome;
    }
}
