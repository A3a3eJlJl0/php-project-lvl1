<?php

namespace Brain\Games\Games\ProgressionGame;

use function Brain\Games\Engine\ask;
use function Brain\Games\Engine\check;
use function Brain\Games\Engine\greet;
use function Brain\Games\Engine\printTitle;
use function cli\line;

function startProgressionGame()
{
    $counter = 3;

    $name = greet();
    printTitle('What number is missing in the progression?');

    while ($counter > 0) {
        $length = rand(5, 10);
        $start = rand(0, 100);
        $diff = rand(1, 20);
        $progression = "";

        for ($i = 0; $i < $length; $i++) {
            $el = $start + $diff * $i;
            if ($i == ceil($length / 2 - 1)) {
                $correctAnswer = $el;
                $el = '...';
            }
            $progression .= "$el ";
        }

        $userAnswer = ask($progression);

        if (!check($userAnswer, $correctAnswer, $name)) {
            return;
        }
        $counter--;
    }
    line("Congratulations, {$name}!");
}

