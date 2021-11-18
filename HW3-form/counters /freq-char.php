<?php
function freqCharacter($str)
{
    $return_str = '';

    $str = preg_replace('/\s+/', '', $str);
    $general_count = strlen($str);
    foreach (count_chars($str, 1) as $strr => $value) {
        $return_str .= "<span class='freq-line'>" . chr($strr) . " occurred a number of $value times in the string." . "</span> (" . percent($value, $general_count) . "percent of total) <br>";

    }
    return $return_str;
}



