<?php
use PHPUnit\Framework\TestCase;

class UsefulAnnotationsTest extends TestCase {

    private $value;
 
    /**
     * @before
     * The @before annotation can be used to specify methods that should be called before each test 
     * method in a test case class.
     */
    public function runBeforeEachTestMethod()
    {
        echo PHP_EOL . '@before, setting value = 1' . PHP_EOL;
        $this->value = 1;//before every test we set the value to be 1.
    }

    /**
     * @after
     * This will be called after each test.
     */
    public function runAfterEachTestMethod()
    {
        echo '@after, setting value = 0' . PHP_EOL;
        unset($this->value);//after every test we erase, reset the value.
    }

    public function testAnnotations1()
    {
        $this->value++;//at first time, the value will be 2
        $expected = 2;//so this test will pass. 
        $result = $this->value;
        $this->assertEquals($expected,$result);
        echo 'Test function triggered.' . PHP_EOL;

    }
}

// @beforeClass
// @afterClass
// @dataProvider


