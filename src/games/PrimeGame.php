<?php

namespace Brain\Games\Games\PrimeGame;

use function Brain\Games\Engine\ask;
use function Brain\Games\Engine\check;
use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\printTitle;
use function cli\line;

function startPrimeGame()
{
    $counter = 3;

    $name = greet();
    printTitle('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($counter > 0) {
        $a = rand(1, 100);
        $correctAnswer = checkPrime($a);
        $userAnswer = ask("$a");

        if (!check($userAnswer, $correctAnswer, $name)) {
            return;
        }
        $counter--;
    }
    line("Congratulations, {$name}!");
}

function checkPrime(int $a): string
{
    for ($i = 2; $i <= sqrt($a); $i++) {
        if ($a % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}
