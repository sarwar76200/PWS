<?php
function gen_hash($pass)
{
    $base = 43;
    $modulo = (int) 1E9 + 7;
    $h = 0;
    for ($i = 0; $i < strlen($pass); $i++) {
        $h = ($h * $base + ord($pass[$i])) % $modulo;
    }
    return dechex($h);
}
