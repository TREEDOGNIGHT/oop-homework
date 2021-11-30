<?php

function avarageWordsInSentense($str)
{
    $key = 0;
    $item_count = [];
    $sentense_array = preg_split('/(?<=[.?!;:])\s+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    //var_dump($sentense_array);
    if (is_array($sentense_array)) {
        foreach ($sentense_array as $key => $sentense) {
            $item_count[$key] = str_word_count($sentense);
        }
    }
    var_dump($key);

    return round(array_sum($item_count) / ($key + 1));
    //return $return_str;
}


