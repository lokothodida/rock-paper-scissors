<?php

use lokothodida\RockPaperScissors\Game;
use lokothodida\RockPaperScissorsCli\CommandLineReferee;

require __DIR__ . '/vendor/autoload.php';

$computerChoices = ['R', 'P', 'S'];
$computer = $computerChoices[rand(0, 2)];

(new Game(new CommandLineReferee()))->play('', $computer);
