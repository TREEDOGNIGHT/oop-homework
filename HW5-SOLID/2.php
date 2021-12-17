<?php

/*Can Santa save Christmas?

Oh no! Santa's little elves are sick this year. He has to distribute the presents on his own.

But he has only 24 hours left. Can he do it?
Your Task:

You will get an array as input with time durations as string in the following format: HH:MM:SS.
Each duration represents the time taken by Santa to deliver a present.
Determine whether he can do it in 24 hours or not.
In case the time required to deliver all of the presents
is exactly 24 hours, Santa can complete the delivery ;-) .*/

//SOLUTION
function determine_time(array $durations): bool
{
    if (empty($durations)) {
        return true;
    }
    $limit_hours = 24;
    foreach ($durations as $key => $time) {
        $block = explode(':', $time);
        $hours = $block[0] + (($block[1] * 60 + $block[2]) / 3600);
        $limit_hours -= $hours;
    }
    if ($limit_hours < 0) {
        return false;

    } else {
        return true;
    }
}

//For test

class CanSantaSaveChristmasTest extends TestCase
{
    public function testFixed()
    {
        $this->assertTrue(determine_time(["00:30:00", "02:30:00", "00:15:00"]));
        $this->assertTrue(determine_time([]));
        $this->assertTrue(determine_time(["12:00:00", "12:00:00"]));
        $this->assertFalse(determine_time(["06:00:00", "12:00:00", "06:30:00"]));
    }
}