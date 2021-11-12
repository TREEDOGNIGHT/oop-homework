<?php

/*
 * Complete the 'isBalanced' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function isBalanced($s) {
     $opening_tag = array('}' => '{', ']' => '[', ')' => '(');
       $parens = array();
    foreach (str_split($s) as $char) {
        switch ($char) {
            case '{':
            case '[':
            case '(':
                $parens[] = $char;
                break;
            case '}':
            case ']':
            case ')':
                if (!count($parens) || array_pop($parens) != $opening_tag[$char]) {
                    
                  return 'NO';
                    
                } 
                break;
            default:
                break;
        }
    }
    return (count($parens) === 0) ? 'YES' : 'NO';
}


$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    $result = isBalanced($s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
