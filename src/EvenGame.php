<?php

namespace Brain\Games\EvenGame;

use function Brain\Games\Cli\greet;
use function cli\line;
use function cli\prompt;

function startEvenGame()
{
    $rightAnswers = 0;

    $name = greet();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($rightAnswers < 3) {
        $number = rand(1, 1000);
        $isEven = $number % 2 == 0;
        line("Question: {$number}");

        $answer = prompt('Your answer: ');

        if ($answer === 'yes') {
            if ($isEven) {
                line('Correct!');
                $rightAnswers++;
            } else {
                line("'yes' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}!");
                return;
            }
        } elseif ($answer === 'no') {
            if (!$isEven) {
                line('Correct!');
                $rightAnswers++;
            } else {
                line("'no' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!");
                return;
            }
        }
    }
    line("Congratulations, {$name}!");
}
