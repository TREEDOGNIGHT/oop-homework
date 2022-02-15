<?php
//additional function
function percent($num, $total)
{
    return number_format((100.0 * $num) / $total, 2);
}

if ($_POST["content"] && !empty($_POST["content"])) {
    //var_dump('test_contne');
    $content = $_POST["content"];
    $counters_funcs = ['count-sentences', 'freq-char', 'word-length', 'avarage-wis', 'top10', 'palidrome'];

    foreach ($counters_funcs as $item) {

        require_once './counters/' . $item . '.php';

    }
    ob_start(); ?>
    <p class='success'>Result.....</p>
    <p>Number of character: <?= strlen($content); ?></p>
    <p>Number of words: <?= str_word_count($content); ?></p>
    <p>Number of sentences: <?= countSentences($content); ?></p>
    <p> <?= freqCharacter($content); ?></p>
    <p>Average word length: <?= avarageWord($content); ?></p>
    <p>The average number of words in a sentence: <?= avarageWordsInSentense($content); ?></p>
    <p><?= Top10($content, 'words', 'most_used'); ?></p>
    <p><?= Top10($content, 'words', 'longest'); ?></p>
    <p><?= Top10($content, 'words', 'shortest'); ?></p>
    <p><?= Top10($content, 'sentences', 'longest'); ?></p>
    <p><?= Top10($content, 'sentences', 'shortest'); ?></p>
    <p>Count palidromes: <?= countPalidrome($content); ?></p>
    <p>Top 10 palidromes: <?= top10_palidrome($content); ?></p>
    <p>Hash: <?= hash('sha256', $content); ?></p>
    <?php ob_end_flush();

} else {

    print "<p class='Error'>Problem in Sending Mail.</p>";
}

?>