<?php
function palindrome($str)
{
    $l = 0;
    $r = strlen($str) - 1;
    $flag = 0;

    while ($r > $l) {
        if ($str[$l] != $str[$r]) {
            $flag = 1;
            break;
        }
        $l++;
        $r--;
    }

    if ($flag == 0) {
        return true;
    } else {
        return false;
    }
}

function find_palidrome($str)
{
    $palidrome_array = [];
    $words = preg_split('/\s+/', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($words as $word) {
        if (palindrome($word)) {
            $palidrome_array[] = $word;
        } else {
            continue;
        }

    }
    $palidrome_array = array_unique($palidrome_array);
    return $palidrome_array;
}

function countPalidrome($str)
{
    $array = find_palidrome($str);
    return count($array);
}

function top10_palidrome($str)
{
    $return_string = '';
    $array = find_palidrome($str);

    usort($array, function ($a, $b) {
        return strlen($b) <=> strlen($a);
    });
    $array = array_slice($array, 0, 10);
    foreach ($array as $item) {

        $return_string .= "<p>$item</p>";

    }
    return $return_string;
}

function full_string_palidrome($str)
{

    $str = preg_replace('/[ ,]+/', '', $str);
    if (palindrome($str)) {
        return "Palidrome";
    } else {
        return "Not palidrome";
    }
}