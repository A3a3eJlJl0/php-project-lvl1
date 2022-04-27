<?php

namespace Brain\Games\Games\EvenGame;

use function Brain\Games\Engine\ask;
use function Brain\Games\Engine\check;
use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\printTitle;
use function cli\line;

function startCalcGame()
{
    $counter = 3;
    $operations = ['+', '-', '*'];

    $name = greet();
    printTitle('What is the result of the expression?');

    while ($counter > 0) {
        $a = rand(0, 20);
        $b = rand(0, 20);
        $operation = $operations[rand(0, 2)];

        switch ($operation) {
            case '+':
                $correctAnswer = $a + $b;
                break;
            case '-':
                $correctAnswer = $a - $b;
                break;
            case '*':
                $correctAnswer = $a * $b;
                break;
            default:
                return;
        }

        $userAnswer = ask("$a $operation $b");

        if (!check($userAnswer, $correctAnswer, $name)) {
            return;
        }
        $counter--;
    }
    line("Congratulations, {$name}!");
}
