<?php

if (! function_exists('random_number')) {
    function random_number(int $digit): string
    {
        $randNumber = sprintf(
            '%04d',
            random_int(1, pow(10, $digit) - 1)
        );

        return $randNumber;
    }
}
