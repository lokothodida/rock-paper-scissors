<?php

use PHPUnit\Framework\TestCase;
use lokothodida\RockPaperScissorsCli\CommandLinePlayer;
use lokothodida\RockPaperScissorsCli\CommandLine;
use lokothodida\RockPaperScissors\Gestures\Rock;
use lokothodida\RockPaperScissors\Gestures\Paper;
use lokothodida\RockPaperScissors\Gestures\Scissors;
use lokothodida\RockPaperScissors\Outcome;
use lokothodida\RockPaperScissors\Outcomes\Win;
use lokothodida\RockPaperScissors\Outcomes\Loss;
use lokothodida\RockPaperScissors\Outcomes\Tie;

final class CommandLinePlayerTest extends TestCase
{
    public function testChoosingRMeansChoosingRock()
    {
        $player = new CommandLinePlayer(new InMemoryCommandLine(['R']));

        $this->assertEquals(new Rock(), $player->choose());
    }

    public function testChoosingPMeansChoosingPaper()
    {
        $player = new CommandLinePlayer(new InMemoryCommandLine(['P']));

        $this->assertEquals(new Paper(), $player->choose());
    }

    public function testChoosingSMeansChoosingScissors()
    {
        $player = new CommandLinePlayer(new InMemoryCommandLine(['S']));

        $this->assertEquals(new Scissors(), $player->choose());
    }

    public function testChoosingAnythingElsePromptsAnotherChoiceTillRPOrSIsChosen()
    {
        $player = new CommandLinePlayer($commandLine = new InMemoryCommandLine(['a', 'something', 'R']));

        $this->assertEquals(new Rock(), $player->choose());
        $this->assertEquals(3, $commandLine->totalPrompts());
    }

    public function testIsToldIfTheyWin()
    {
        $player = new CommandLinePlayer($commandLine = new InMemoryCommandLine([]));
        $player->accept(new Win());

        $this->assertEquals("You win!", $commandLine->output());
    }

    public function testIsToldIfTheyLose()
    {
        $player = new CommandLinePlayer($commandLine = new InMemoryCommandLine([]));
        $player->accept(new Loss());

        $this->assertEquals("You lose!", $commandLine->output());
    }

    public function testIsToldIfTheyTie()
    {
        $player = new CommandLinePlayer($commandLine = new InMemoryCommandLine([]));
        $player->accept(new Tie());

        $this->assertEquals("Tie!", $commandLine->output());
    }

    /**
     * @expectedException Exception
     */
    public function testDoesntRecogniseOtherOutcomes()
    {
        $player = new CommandLinePlayer($commandLine = new InMemoryCommandLine([]));
        $player->accept(new class() implements Outcome {});
    }
}

final class InMemoryCommandLine implements CommandLine
{
    private $inputs;
    private $output = '';
    private $prompts = 0;

    public function __construct(array $inputs)
    {
        $this->inputs = $inputs;
    }

    public function readLine(string $message): string
    {
        $this->prompts = $this->prompts + 1;

        return array_shift($this->inputs);
    }

    public function writeLine(string $message): void
    {
        $this->output .= $message;
    }

    public function totalPrompts(): int
    {
        return $this->prompts;
    }

    public function output(): string
    {
        return $this->output;
    }
}
