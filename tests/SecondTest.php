<?php

class SecondTest extends \PHPUnit\Framework\TestCase
{
    function setUp(): void
    {
        $this->cal = new Calendar_Second(2003, 10, 25, 13, 32, 43);
    }
    function testPrevDay_Array()
    {
        $this->assertEquals(
            array(
                'year'   => 2003,
                'month'  => 10,
                'day'    => 24,
                'hour'   => 0,
                'minute' => 0,
                'second' => 0
            ),
            $this->cal->prevDay('array')
        );
    }
}
