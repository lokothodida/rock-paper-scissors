<?php

namespace lokothodida\RockPaperScissorsCli;

final class LocalCommandLine implements CommandLine
{
    public function readLine(string $message): string
    {
        return readline($message);
    }

    public function writeLine(string $message): void
    {
        echo "$message\n";
    }
}
