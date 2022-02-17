<?php

use PHPUnit\Framework\TestCase;

class NumberOfSentencesTest extends TestCase
{

    /**
     * @dataProvider textDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testFunction($input, $expected)
    {
        $analyze = new TextAnalyzer\Analyzer();
        $this->assertEquals($expected, $analyze->numberOfSentences($input));
        $this->assertIsInt($analyze->numberOfSentences($input));
    }

    public function textDataProvider()
    {
        return [
            ['', 0],
            ['текст', 0],
            ['текст для тесту', 0],
            ['текст для, тесту.', 1],
            ['текст для, тесту текст для, тесту', 2],
            ['текст для, тесту мві', 2],
        ];
    }

}