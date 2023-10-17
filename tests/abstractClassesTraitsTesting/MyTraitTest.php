<?php
use PHPUnit\Framework\TestCase;
use forTestingAbstractClassesAndTraits\MyTrait;

class MyTraitTest extends  TestCase {

    public function testMyTraitMethod(): void
    {
        /**
         * The getMockForTrait() method returns a mock object that uses a specified trait. All 
         * abstract methods of the given trait are mocked. This allows for testing the concrete 
         * methods of a trait.
         */
        $mockTrait = $this->getMockBuilder(MyTrait::class)
                            ->getMockForTrait();
        
        
        $this->assertSame(20, $mockTrait->traitMethod(10));
    }
}
