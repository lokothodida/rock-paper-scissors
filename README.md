[![Build Status](https://travis-ci.org/lokothodida/rock-paper-scissors.svg?branch=master)](https://travis-ci.org/lokothodida/rock-paper-scissors)

# Rock Paper Scissors
A small domain model implementing the simple game of
Rock Paper Scissors. The aim was to treat the game
as a Domain Driven Design exercise: how can we
represent the rules of the game in a way that is
transparent within the code itself?

Included is a command line script for running the
game against the computer (which just randomizes
its choice each time).

## Requirements
* PHP 7.2+

## Installation
```
cd cli
composer install
```

## Playing with the CLI
CLI game is run from the `/cli` directory.

```
cd cli
php index.php
Select a move (R, P, S) > R
Tie!
```

Type `R`, `P` or `S` into the command line.
