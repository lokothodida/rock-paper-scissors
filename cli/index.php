<?php

use lokothodida\RockPaperScissors\Game;
use lokothodida\RockPaperScissorsCli\CommandLinePlayer;
use lokothodida\RockPaperScissorsCli\LocalCommandLine;
use lokothodida\RockPaperScissorsCli\RandomComputerPlayer;
use lokothodida\RockPaperScissorsCli\PseudoRandomNumberGenerator;

require __DIR__ . '/vendor/autoload.php';

(new Game(
    new CommandLinePlayer(new LocalCommandLine()),
    new RandomComputerPlayer(new PseudoRandomNumberGenerator()))
)->play();
