<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    use CustomAssertionTrait;

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
    // public function testValidUserName2() 
    // {
    //     /**
    //      * We create an anonymus class/object, that extends our User class.
    //      * Then simply we add to this anon. class a getter for the protected property.
    //      * Then we simply use the getter to get the user's name, and then we can assert it with
    //      * our test.
    //      * The point is, that the protected property is available in child classes. 
    //      * We can't use this solution for private properties, because private properties are NOT
    //      * available in child class. 
    //      * While, we CAN use the bindTo() solution to protected properties.
    //      */
    //     $user = new class('donald', 'Trump') extends User {
    //         public function getName()
    //         {
    //             return $this->name;
    //         }
    //     };
    //     $this->assertSame('Donald', $user->getName());
    // }

    // public function testValidDataFormat() 
    // {
    //     $user = new User('donald', 'Trump');

    //     /**
    //      * Here we create a mockedDB, which will be used for testing, instead of the
    //      * Database class, that simulates a real db. Now, the mockedDb inherits from Database class,
    //      * and owerwrites the getEmailAndLastName() function.
    //      * The point is, not to use the Database class in testing, but to use instead the mockedDb.
    //      */
    //     $mockedDb = new class extends Database {

    //         public function getEmailAndLastName()
    //         {
    //             echo 'no real db touched!';
    //         }
    //     };

    //     $setUserClosure = function() use ($mockedDb){
    //         $this->db = $mockedDb;//TODO where is this  $this->db??
    //     };

    //     $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));
    //     $executeSetUserClosure();

    //     $this->assertSame('Donald Trump', $user->getFullName());
    // }
    
    /**
     * Here we test a private method, that by default can't be accessed.
     */
    // public function testGettingPrivateMethod()
    // {
    //     $userTestObject = $this;//$this here is = UserTest object
    //     $user = new User('donald', 'Trump');
    //     $expected = 'private function accessed!';

    //     //create a closure that will do the comparison
    //     $closure = function ()  use ($userTestObject,$expected){
    //         $userTestObject->assertSame($expected, $this->triggerPrivateFunction());//TODO this works, this is not an error. How make the error feedback go away?
    //     };

    //     //binding the closure with bindTo(), to the User object
    //     $closure = $closure->bindTo($user, get_class($user));

    //     //executing the closure
    //     $closure();
    // }

    /**
     * Here we test a protected method. We could use the the bindTo() way that we use with the private
     * methods, but there is a simpler way. Protected methods can be called from child class. So we 
     * here create a child class, and give it a getter, that will return our desired protected function.
     */
    // public function testGettingProtectedMethod() 
    // {
    //     $user = new class('donald', 'Trump') extends User {
    //         public function getProtectedMethod()
    //         {
    //             return $this->triggerProtectedFunction();
    //         }
    //     };
    //     $this->assertSame('protected function accessed!', $user->getProtectedMethod());
    // }

    /**
     * Example how to write custom assertions.
     * Now, we want to test every item for type in the $data array. We can do the type testing by
     * writing testing code with the built in assertSomething() method. But if we need to repeat this
     * testing in a lot of different places, to avoid code repetition, it is a godd idea to use
     * custom assertions. We do this by using php traits.
     */
    public function testCustomDataStructure()
    {
        $data = [
            'nick' =>'Dolar',//string type
            'email' => 'bla@gmail.com',//valid email validation
            'age' => 70//integer type
        ];

        $this->assertArrayData($data);
    }

}
