<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\gameLogic;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const RANDOM_MIN = 1;
const RANDOM_MAX = 20;

function gcd($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return gcd($b, $a % $b);
}

function getRandomNumber()
{
    return rand(RANDOM_MIN, RANDOM_MAX);
}

function play()
{
    $generateGameData = function () {
        $firstNumber = getRandomNumber();
        $secondNumber = getRandomNumber();
        $question = "{$firstNumber} {$secondNumber}";
        $answer = (string)(gcd($firstNumber, $secondNumber));

        return [$question, $answer];
    };

    gameLogic(DESCRIPTION, $generateGameData);
    return;
}