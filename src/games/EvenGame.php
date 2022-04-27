<?php

namespace Brain\Games\Games\EvenGame;

use function Brain\Games\Engine\ask;
use function Brain\Games\Engine\check;
use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\printTitle;
use function cli\line;

function startEvenGame()
{
    $counter = 3;

    $name = greet();
    printTitle('Answer "yes" if the number is even, otherwise answer "no".');

    while ($counter > 0) {
        $number = rand(1, 1000);
        $correctAnswer = boolval($number % 2) ? 'no' : 'yes';
        $userAnswer = ask("$number");

        if (!check($userAnswer, $correctAnswer, $name)) {
            return;
        }
        $counter--;
    }
    line("Congratulations, {$name}!");
}
