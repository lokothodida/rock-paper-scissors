<?php

use lokothodida\RockPaperScissors\Game;
use lokothodida\RockPaperScissorsCli\CommandLinePlayer;
use lokothodida\RockPaperScissorsCli\RandomComputerPlayer;

require __DIR__ . '/vendor/autoload.php';

(new Game(new CommandLinePlayer(), new RandomComputerPlayer()))->play();
