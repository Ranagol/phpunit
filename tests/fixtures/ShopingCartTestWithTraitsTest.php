<?php
use PHPUnit\Framework\TestCase;


class ShopingCartTestWithTraitsTest extends  TestCase {

    /**
     * Creates and stores a db connection, once.
     */
    use DatabaseTrait;

    /**
     * Creates a Shopping Cart object before testing, destroy Shopping cart after testing. Once.
     */
    use ShoppingCartFixtureTrait;

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
