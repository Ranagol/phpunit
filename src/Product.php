<?php

// use Logger;
// use ProductAbstract;

class Product extends ProductAbstract {

    public $session;

    protected $addLoggerCallable = [Logger::class, 'log'];//This is the Logger class and the 'log' method in the Logger class

    public function __construct(SessionInterface $session)//this is not injection! This is type hinting.
    {
        $this->session = $session;
    }

    /**
     * 
     */
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

        /**
         * Once we "get a product from db", we want to write out product with a Logger into a log.
         * Logger has a static method for this. And this is the static method that we want to 
         * test.
         * 
         * Now, here, below we simply call the Logger class's log() method with the $product
         * argument. Basically we do something, that is same as this code:
         * Logger::log($product);
         * 
         * All this allows us testing the Logger::log, without calling the Logger class.
         */
        call_user_func($this->addLoggerCallable, $product);

        return $product;
    }
}
