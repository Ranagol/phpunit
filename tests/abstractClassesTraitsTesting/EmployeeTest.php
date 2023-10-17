<?php
use PHPUnit\Framework\TestCase;
use forTestingAbstractClassesAndTraits\Employee;
use forTestingAbstractClassesAndTraits\PersonAbstract;

//Testing abstract class here
class EmployeeTest extends  TestCase {

    public function testFullName()
    { 
        /**
         * Here we create $mockAbstract.
         * The getMockForAbstractClass() method returns a mock object for an abstract class. All 
         * abstract methods of the given abstract class are mocked. This allows for testing the 
         * concrete methods of an abstract class.
         */
        $mockAbstract = $this->getMockBuilder(PersonAbstract::class)
                //because PersonAbstract class has a constructor, that demands two args
                 ->setConstructorArgs(['John', 'Doe'])
                 ->getMockForAbstractClass();

        /**
         * Here we set getSalary() in $mockAbstract
         */
        $mockAbstract
                ->expects($this->any() )//the getSalary() can be triggered any times, it doesn't matter
                ->method('getSalary')//this is the method that we want to trigger
                ->will($this->returnValue(6000));//6000 is just a random number
            
        /**
         * The testing of the $mockAbstract.
         */
        $this->assertSame('John Doe earns 6000 per month', $mockAbstract->showFullNameAndSalary());
    }
}
