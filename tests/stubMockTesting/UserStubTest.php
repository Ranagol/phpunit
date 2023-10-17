<?php
use PHPUnit\Framework\TestCase;
use forStubMockTesting\User;

class UserStubTest extends TestCase {

    /**
     * We want to achieve here two things:
     * 1 - not to call the User constructor
     * 2 - not to write into db, when useing the $user->save()
     */
    public function testCreateStubUser()
    {
        /**
         * ->setMethods() is deprecated, replaced by onlyMethods()
         * https://stackoverflow.com/questions/65075204/method-setmethods-is-deprecated-when-try-to-write-a-php-unit-test
         */
        $stub = $this->getMockBuilder(User::class)
                        ->disableOriginalConstructor()//with this we turn off the constructor
                        // ->setMethods(['save'])this is deprecated
                        ->onlyMethods(['save'])//here we just say that the $stub will have a save() method
                        ->getMock();

        /**
         * Here we define what will the save() do. It will simply return true. Because this is what 
         * the original save() does in the User class, after writing the user object into the db.
         */
        $stub->method('save')->willReturn(true);

        /**
         * Expecting true here, because the name and the email are ok
         */
        $this->assertTrue($stub->createUser('Adam', 'email@com.pl'));

        /**
         * Expecting false here, because the email address is not valid.
         */
        $this->assertFalse($stub->createUser('Adam', 'email'));//TODO How to get rid of this false error feedback? All is ok here, this is the tut code.
    }

}
