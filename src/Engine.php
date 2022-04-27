<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");
    return $name;
}

function ask(string $question): string
{
    line("Question: $question");
    return prompt('Your answer: ');
}

function printTitle($title)
{
    line($title);
}

function check($answer, $expected, $name): bool
{
    if ($answer == $expected) {
        line('Correct!');
        return true;
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$expected'.\nLet's try again, {$name}!");
        return false;
    }
}
