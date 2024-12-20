<?php

require_once 'Calendar/Validator.php';

class ValidatorErrorTest extends \PHPUnit\Framework\TestCase
{
    public $vError;
    function setUp(): void
    {
        $this->vError = new Calendar_Validation_Error('foo', 20, 'bar');
    }
    function testGetUnit()
    {
        $this->assertEquals($this->vError->getUnit(), 'foo');
    }
    function testGetValue()
    {
        $this->assertEquals($this->vError->getValue(), 20);
    }
    function testGetMessage()
    {
        $this->assertEquals($this->vError->getMessage(), 'bar');
    }
    function testToString()
    {
        $this->assertEquals($this->vError->toString(), 'foo = 20 [bar]');
    }
}
