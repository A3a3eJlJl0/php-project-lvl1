<?php

namespace Brain\Games\Games\GcdGame;

use function Brain\Games\Engine\ask;
use function Brain\Games\Engine\check;
use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\printTitle;
use function cli\line;

function startGcdGame()
{
    $counter = 3;

    $name = greet();
    printTitle('Find the greatest common divisor of given numbers.');

    while ($counter > 0) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $correctAnswer = findGcd($a, $b);
        $userAnswer = ask("$a $b");

        if (!check($userAnswer, $correctAnswer, $name)) {
            return;
        }
        $counter--;
    }
    line("Congratulations, {$name}!");
}

function findGcd(int $a, int $b): int
{
    while ($a != 0 && $b != 0) {
        if ($a > $b) {
            $a %= $b;
        } else {
            $b %= $a;
        }
    }
    return ($a + $b);
}
