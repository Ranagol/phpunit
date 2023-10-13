<?php
// use ShopingCart;//TODO why is this line not needed for creating a ShopingCart instance? How can this work?
use PHPUnit\Framework\TestCase;


class ShopingCartTest extends  TestCase {

    protected $cart;

    protected static $db_connection = false;

    /**
     * This method is called before every test method in this test class. If we have for example
     * 3 testing methods in this class, then this method will be called 3 times. BEFORE.
     */
    protected function setUp(): void
    {
        $this->cart = new ShopingCart();//creating new instance of the shopping cart
    }

    /**
     * This method is called after a test method form this class was called. If we have for example
     * 3 testing methods in this class, then this method will be called 3 times. AFTER.
     */
    protected function tearDown(): void
    {
        unset($this->cart);//deleting the new instance of the shopping cart
    }

    /**
     * This method will be called only once, before running the first test method. So, no matter how 
     * many test methods we have, this method will be called ony once, at the very beginning. The
     * $db_connection is stored in the class, so it it not lost when the object is destroyed.
     */
    public static function setUpBeforeClass(): void
    {
        if (self::$db_connection) {
            return;
        }
        
        try {
            // self::$db_connection = new \PDO('sqlite::database.db');
            self::$db_connection = new PDO("mysql:host=localhost;dbname=breeze", "root", "");
            echo "Connected successfully" . PHP_EOL;
        } catch (\Throwable $th) {
            echo "Connection failed: " . $th->getMessage() . PHP_EOL;
        }
    }

    /**
     * This will be called after the last test was run, and it will be called only once. Here we 
     * destroy our db connection, because we are done with the testing.
     */
    public static function tearDownAfterClass(): void
    {
        self::$db_connection = null;
        // unlink(':database.db');
    }

    /**
     * This is our first test method. We add one new item to the cart, and we expect then that one
     * item will be in the cart.
     */
    public function testCorrectNumberOfItems()
    {
        $expected = 1;
        $this->cart->addItem('one');
        $result = $this->cart->amount;
        $this->assertEquals($expected, $result);
    }

    /**
     * Second test method.
     */
    public function testCorrectProductName()
    {
        $this->cart->addItem('Apple');
        $this->assertContains('Apple', $this->cart->cartItems);
    }
  
}
