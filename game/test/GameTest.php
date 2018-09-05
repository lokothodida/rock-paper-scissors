<?php

use lokothodida\RockPaperScissors\Game;
use lokothodida\RockPaperScissors\Referee;
use lokothodida\RockPaperScissors\Move;
use lokothodida\RockPaperScissors\Outcome;
use lokothodida\RockPaperScissors\Outcomes\Player1Wins;
use lokothodida\RockPaperScissors\Outcomes\Player2Wins;
use lokothodida\RockPaperScissors\Outcomes\Tie;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private $outcome;
    private $referee;

    public function setUp()
    {
        $this->referee = new class($this->winner(), $this->loser()) implements Referee {
            private $winner;
            private $loser;
            private $outcome;

            public function __construct(Move $winner, Move $loser)
            {
                $this->winner = $winner;
                $this->loser = $loser;
            }

            public function interpret(string $move): Move
            {
                return $move === 'winner' ? $this->winner : $this->loser;
            }

            public function announce(Outcome $outcome): void
            {
                $this->outcome = $outcome;
            }

            public function lastOutcome(): Outcome
            {
                return $this->outcome;
            }
        };
    }

    public function testWhenPlayer1sMoveBeatsPlayer2sMoveThenPlayer1Wins()
    {
        $game = new Game($this->referee);
        $game->play('winner', 'loser');
        $this->assertEquals(new Player1Wins(), $this->referee->lastOutcome());
    }

    public function testWhenPlayer2sMoveBeatsPlayer1sMoveThenPlayer2Wins()
    {
        $game = new Game($this->referee);
        $game->play('loser', 'winner');
        $this->assertEquals(new Player2Wins(), $this->referee->lastOutcome());
    }

    public function testWhenNeitherPlayerBeatsTheOtherThenItIsATie()
    {
        $game = new Game($this->referee);
        $game->play('loser', 'loser');
        $this->assertEquals(new Tie(), $this->referee->lastOutcome());
    }

    private function winner(): Move
    {
        return new class() implements Move {
            public function beats(Move $move): bool
            {
                return true;
            }
        };
    }

    private function loser(): Move
    {
        return new class() implements Move {
            public function beats(Move $move): bool
            {
                return false;
            }
        };
    }
}
