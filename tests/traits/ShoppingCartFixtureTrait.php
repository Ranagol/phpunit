<?php

/**
 * Creates a Shopping Cart object before every testing method, destroy Shopping cart after every 
 * testing method.
 */
trait ShoppingCartFixtureTrait {

    protected $cart;

    protected function setUp(): void
    {
        $this->cart = new ShopingCart;
    }

    protected function tearDown(): void
    {
        unset($this->cart);
    }
}
