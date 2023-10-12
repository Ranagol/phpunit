<?php
use PHPUnit\Framework\TestCase;

class DependenciesTest extends TestCase {

    private $value;

    public function testFirstTest()  
    {
        $this->value = 1;
        $this->assertEquals(1,$this->value);
        return $this->value;//<--will be passed testDependency1() as argument
    }

    /**
     * @depends testFirstTest
     * This method can only then return OK testing results, if first the testFirstTest() is run.
     * It depends on testFirstTest(). The testFirstTest() will return something with this line of
     * code: return $this->value;
     * Now, whatever is returned, that will be passed to this testDependency1($value), as the $value
     * argument. Automatically.
     */
    public function testDependency1($value)//argument comes automatically from testFirstTest()
    {
        $value++;
        $expected = 2;
        $result = $value;
        $this->assertEquals($expected,$result);
        return $value;//will be passed to testDependency2() as argument
    }

    /**
     * @depends testDependency1
     */
    public function testDependency2($value)//argument comes automaticllay from testDependency1()
    {
        $value++;
        $expected = 3;
        $result = $value;
        $this->assertEquals($expected,$result);
    }

}
