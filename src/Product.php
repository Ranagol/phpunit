<?php

use ProductAbstract;

class Product extends ProductAbstract {

    public $session;

    protected $addLoggerCallable = [Logger::class, 'log'];

    public function __construct(SessionInterface $session)//this is not injection! This is type hinting.
    {
        $this->session = $session;
    }

    public function setLoggerCallable(callable $callable)
    {
        $this->addLoggerCallable = $callable;
    }

    public function fetchProductById($id)
    {
        /**
         * this simulates a call to the database to fetch the product. So we get this product.
         */
        $product = 'product 1';

        /**
         * We write the product into the session.
         */
        $this->session->write($product);
        return $product;
    }
}
