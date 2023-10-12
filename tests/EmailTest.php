<?php
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase {

    /**
     * @dataProvider emailsProvider
     * Here we are simply testing if an email address is valid. What emails? Emails that are
     * provided from emailsProvider dataProvider.
     */
    public function testValidEmail($email)
    {
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $email);
    }

    /**
     * @dataProvider numbersProvider
     * Here we are testing multiplication. For testing we will need 3 numbers. In this order:
     * $a, $b, $expected. That is in the numbersProvider dataProvider.
     */
    public function testMath($a, $b, $expected)
    {
        $result = $a * $b;
        $this->assertEquals($expected, $result);
    }

    public function emailsProvider()
    {
        return [
            ['dsds@ffs.df'],
            ['dsds@ffs.dffdfd'],
            ['dsds@ffs'],
        ];
    }

    public function numbersProvider()
    {
        return [
            [1,2,2],//1 * 1 = 2 OK
            [2,2,4],//2 * 2 = 4 OK
            [3,3,10],//3 * 3 = 10 FAILED
        ];
    }

}
