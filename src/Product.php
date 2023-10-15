<?php

class Product {

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        // call the database to fetch the product
        $product = 'product 1';
        $this->session->write($product);
        return $product;
    }
}
