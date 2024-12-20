<?php

class YearTest extends \PHPUnit\Framework\TestCase
{
    function setUp(): void
    {
        $this->cal = new Calendar_Year(2003);
    }
    function testPrevYear_Object()
    {
        $this->assertEquals(new Calendar_Year(2002), $this->cal->prevYear('object'));
    }
    function testThisYear_Object()
    {
        $this->assertEquals(new Calendar_Year(2003), $this->cal->thisYear('object'));
    }
    function testPrevMonth()
    {
        $this->assertEquals(12, $this->cal->prevMonth());
    }
    function testPrevMonth_Array()
    {
        $this->assertEquals(
            array(
                'year'   => 2002,
                'month'  => 12,
                'day'    => 1,
                'hour'   => 0,
                'minute' => 0,
                'second' => 0
            ),
            $this->cal->prevMonth('array')
        );
    }
    function testThisMonth()
    {
        $this->assertEquals(1, $this->cal->thisMonth());
    }
    function testNextMonth()
    {
        $this->assertEquals(2, $this->cal->nextMonth());
    }
    function testPrevDay()
    {
        $this->assertEquals(31, $this->cal->prevDay());
    }
    function testPrevDay_Array()
    {
        $this->assertEquals(
            array(
                'year'   => 2002,
                'month'  => 12,
                'day'    => 31,
                'hour'   => 0,
                'minute' => 0,
                'second' => 0
            ),
            $this->cal->prevDay('array')
        );
    }
    function testThisDay()
    {
        $this->assertEquals(1, $this->cal->thisDay());
    }
    function testNextDay()
    {
        $this->assertEquals(2, $this->cal->nextDay());
    }
    function testPrevHour()
    {
        $this->assertEquals(23, $this->cal->prevHour());
    }
    function testThisHour()
    {
        $this->assertEquals(0, $this->cal->thisHour());
    }
    function testNextHour()
    {
        $this->assertEquals(1, $this->cal->nextHour());
    }
    function testPrevMinute()
    {
        $this->assertEquals(59, $this->cal->prevMinute());
    }
    function testThisMinute()
    {
        $this->assertEquals(0, $this->cal->thisMinute());
    }
    function testNextMinute()
    {
        $this->assertEquals(1, $this->cal->nextMinute());
    }
    function testPrevSecond()
    {
        $this->assertEquals(59, $this->cal->prevSecond());
    }
    function testThisSecond()
    {
        $this->assertEquals(0, $this->cal->thisSecond());
    }
    function testNextSecond()
    {
        $this->assertEquals(1, $this->cal->nextSecond());
    }
    function testGetTimeStamp()
    {
        $stamp = mktime(0, 0, 0, 1, 1, 2003);
        $this->assertEquals($stamp, $this->cal->getTimeStamp());
    }
    function testSize()
    {
        $this->cal->build();
        $this->assertEquals(12, $this->cal->size());
    }
    function testFetch()
    {
        $this->cal->build();
        $i = 0;
        while ($Child = $this->cal->fetch()) {
            $i++;
        }
        $this->assertEquals(12, $i);
    }
    function testFetchAll()
    {
        $this->cal->build();
        $children = array();
        $i = 1;
        while ($Child = $this->cal->fetch()) {
            $children[$i] = $Child;
            $i++;
        }
        $this->assertEquals($children, $this->cal->fetchAll());
    }
    function testSelection()
    {
        require_once(CALENDAR_ROOT . 'Month.php');
        $selection = array(new Calendar_Month(2003, 10));
        $this->cal->build($selection);
        $i = 1;
        while ($Child = $this->cal->fetch()) {
            if ($i == 10)
                break;
            $i++;
        }
        $this->assertTrue($Child->isSelected());
    }
}
