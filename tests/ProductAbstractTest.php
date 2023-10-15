<?php
use PHPUnit\Framework\TestCase;

class ProductAbstractTest extends TestCase {

    public function testTriggerAbstractMethod()
    {
        /**
         * Here we instantiate an anon. class, that inherits from the abstract class. This is how
         * we can test method from abstract class.
         */
        $productAbstract = new class extends ProductAbstract {
            //there is nothing here
        };

        $this->assertSame('done!',$productAbstract->doSomething());
    }
}
