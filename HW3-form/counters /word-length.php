<?php
function avarageWord($str)
{
    $word_count = $word_length = 0;

    $words = preg_split('/\s+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($words as $word) {
        $word_count++;
        $word_length += strlen($word);
    }
    return sprintf("The average word length from %d words is %.0f characters.",
        $word_count,
        intdiv($word_length, $word_count));
}



