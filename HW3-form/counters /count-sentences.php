<?php
function countSentences($str)
{
    return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/', $str, $match);
}