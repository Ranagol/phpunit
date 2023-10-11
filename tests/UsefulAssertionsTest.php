<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase
{   
    /**
     * Asertions usually require two arguments. 
     * 1: what we are expecting
     * 2: the actual result of the testing
     * If these two are === than all is cool!
     */
    public function testAssertSame()//for strings
    {
        $expected = 'baz';
        $result = 'BAZ';//this test will fail
        $this->assertSame($expected, $result);
    }

    public function testAssertEquals()//for numbers
    {
        $expected = 1;
        $result = 2;//this test will fail
        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty()
    {
        //this will fail because the array is not empty
        $this->assertEmpty(['foo']);
        // $this->assertEmpty([]);//this will pass

    }

    public function testAssertNull()
    {
        //this will fail because the value is not null
        $this->assertNull(1);
    }

    public function testAssertGreaterThan()
    {
        $expected = 2;
        $actual = 1;
        $this->assertGreaterThan($expected, $actual);
    }

    public function testAssertFalse()
    {
        //Will fail, because we expect false here
        $this->assertFalse(true);
    }

    public function testAssertTrue()
    {
        //Will fail, because we expect true here
        $this->assertTrue(false);
    }

    /**
     * https://docs.phpunit.de/en/8.5/assertions.html#assertcount
     * Will fail, because we expect here that the array count will be 3.
     * Instead the array has two items.
     */
    public function testAssertCount()
    {
        $this->assertCount(3, [1,2]);
    }

    public function testAssertContains()
    {
        //Will fail, because the array does not contain number 4
        $this->assertContains(4, [1, 2, 3]);
    }

    public function testAssertStringContainsString()
    {
        //will fail because 'baz' does not contain 'foo'
        $searchFor = 'foo';
        $searchIn = 'baz';
        $this->assertStringContainsString($searchFor, $searchIn);
    }

    /**
     * https://docs.phpunit.de/en/8.5/assertions.html#assertinstanceof
     * Here we check if the Exception Object (...) is an instance of class "RuntimeException". 
     * It is not. So the test will fail.
     */
    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(RuntimeException::class, new Exception);
    }

    public function testAssertArrayHasKey()
    {
        //Will fail, because there is not bazf key in the array
        $this->assertArrayHasKey('bazf', ['baz'=>'bar']);
    }

    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable('/path/to/directory');
    }

    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable('/path/to/file');
    }


}
