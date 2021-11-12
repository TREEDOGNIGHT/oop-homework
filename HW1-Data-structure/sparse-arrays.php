<?php

/*
 * Complete the 'matchingStrings' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. STRING_ARRAY strings
 *  2. STRING_ARRAY queries
 */

function matchingStrings($strings, $queries) {
  $resultArray = array();
foreach($strings as $value) {
    if(in_array($value, $queries)){        
    $resultArray[$value] = isset($resultArray[$value]) ? $resultArray[$value] + 1 : 1;           
    } else {     
        $resultArray[$value] = 0;  
    }
}

foreach($queries as $value) {
        $resultArray2[$value] = (!empty($resultArray[$value])) ? $resultArray[$value] : 0; 
}
return $resultArray2;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$strings_count = intval(trim(fgets(STDIN)));

$strings = array();

for ($i = 0; $i < $strings_count; $i++) {
    $strings_item = rtrim(fgets(STDIN), "\r\n");
    $strings[] = $strings_item;
}

$queries_count = intval(trim(fgets(STDIN)));

$queries = array();

for ($i = 0; $i < $queries_count; $i++) {
    $queries_item = rtrim(fgets(STDIN), "\r\n");
    $queries[] = $queries_item;
}

$res = matchingStrings($strings, $queries);

fwrite($fptr, implode("\n", $res) . "\n");

fclose($fptr);
