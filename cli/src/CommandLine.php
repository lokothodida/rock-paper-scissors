<?php

namespace lokothodida\RockPaperScissorsCli;

interface CommandLine
{
    public function readLine(string $message): string;
    public function writeLine(string $message): void;
}
