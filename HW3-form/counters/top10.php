<?php
function Top10($str, $data = 'sentences', $params = 'most_used', $counter = 10)
{
//data {{sentences, words}}
//params {{most_used, longest, shortest }}
    $return_string = '';
    if ($data === 'sentences') {
        $array = preg_split('/(?<=[.?!;:])\s+/', $str, -1, PREG_SPLIT_NO_EMPTY);


    } else if ($data === 'words') {

        $array = preg_split("/\s+/", $str);

    } else {
        return 'uncorrect parameter number 2($data) or number 3 ($params)';
    }
    $array = array_unique($array);
    if ($array) {

        switch ($params) {
            case 'most_used':
                $return_string = 'Top ' . $counter . ' most used ' . $data . ':';
                $values = array_count_values($array);
                arsort($values);
                $popular = array_slice(array_keys($values), 0, $counter, true);
                foreach ($popular as $pop_item) {

                    $return_string .= "<p>$pop_item</p>";

                }
                break;
            case 'longest':
                $return_string = 'Top ' . $counter . ' longest ' . $data . ':';
                usort($array, function ($a, $b) {
                    return strlen($b) <=> strlen($a);
                });
                $array = array_slice($array, 0, 10);
                foreach ($array as $item) {

                    $return_string .= "<p>$item</p>";

                }
                break;
            case 'shortest':
                $return_string = 'Top ' . $counter . ' shortest ' . $data . ':';
                usort($array, function ($a, $b) {
                    return strlen($a) <=> strlen($b);
                });
                $array = array_slice($array, 0, 10);
                foreach ($array as $item) {

                    $return_string .= "<p>$item</p>";

                }
                break;
        }
        //var_dump($array);
        return $return_string;

    } else {

        return 'Error with parsing, sorry :(';
    }

}