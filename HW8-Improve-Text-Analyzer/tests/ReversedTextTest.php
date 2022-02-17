<?php

use PHPUnit\Framework\TestCase;

class ReversedTextTest extends TestCase
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
        $this->assertEquals($expected, $analyze->reversedText($input));
        $this->assertIsString($analyze->reversedText($input));
    }

    public function textDataProvider()
    {
        return [
            ['', ''],
            ['текст', 'тскет'],
            ['тест', 'тсет'],
        ];
    }

}