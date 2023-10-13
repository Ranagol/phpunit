<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    //FOR PRIVATE PROPERTIES
    // public function testValidUserName()
    // {
    //     $userTestObject = $this;//$this here is = UserTest object
    //     $user = new User('donald', 'Trump');

    //     /**
    //      * We expect in this test, that the user that just we created will be called Donald.
    //      */
    //     $expected = 'Donald';

    //     /**
    //      * PROBLEM: $this->assertSame($expected, $user->name);//This can't work, because $user->name 
    //      * is private.
    //      * SOLUTION: use closure with binding, to be able to access the private property.
    //      * 
    //      */
    //     $closure = function() use ($userTestObject, $expected){
    //         $userTestObject->assertSame($expected, $this->name);
    //     };

    //     /**
    //      * We bind the above closure to the User object.
    //      */
    //     $closure = $closure->bindTo($user, get_class($user));

    //     /**
    //      * Here we simply execute the closure.
    //      */
    //     $closure();
    // }
//TODO Why would we use the anon. class and bindTo() when we could just simply add a getter to the User.php, and that way we could access private and protected properties?

    //FOR PROTECTED PROPERTIES
    public function testValidUserName2() 
    {
        /**
         * We create an anonymus class/object, that extends our User class.
         * Then simply we add to this anon. class a getter for the protected property.
         * Then we simply use the getter to get the user's name, and then we can assert it with
         * our test.
         * The point is, that the protected property is available in child classes. 
         * We can't use this solution for private properties, because private properties are NOT
         * available in child class. 
         * While, we CAN use the bindTo() solution to protected properties.
         */
        $user = new class('donald', 'Trump') extends User {
            public function getName()
            {
                return $this->name;
            }
        };
        $this->assertSame('Donald', $user->getName());
    }

}
