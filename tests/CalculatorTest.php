<?php

use PHPUnit\Framework\TestCase;//This i PU default class, needed for all testings

class CalculatorTest extends TestCase {

    public $calculator;
    public $a;
    public $b;

    /**
     * This method is called before every test method in this test class. If we have for example
     * 3 testing methods in this class, then this method will be called 3 times. BEFORE.
     */
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
        $this->a = 2;
        $this->b = 3;
    }

    /**
     * This method is called after a test method form this class was called. If we have for example
     * 3 testing methods in this class, then this method will be called 3 times. AFTER.
     */
    protected function tearDown(): void
    {
        unset($this->calculator);//deleting the new instance
    }

    public function testAdd()
    {
        $expected = 5;
        $result = $this->calculator->add($this->a, $this->b);
        $this->assertSame($expected, $result);
    }

    public function testSubtract()
    {
        $expected = -1;
        $result = $this->calculator->subtract($this->a, $this->b);
        $this->assertSame($expected, $result);
    }

    public function testMultiply()
    {
        $expected = 6;
        $result = $this->calculator->multiply($this->a, $this->b);
        $this->assertSame($expected, $result);
    }

    public function testDivide()
    {
        $expected = 2/3;
        $result = $this->calculator->divide($this->a, $this->b);
        $this->assertSame($expected, $result);
    }


}