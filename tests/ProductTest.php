<?php
use PHPUnit\Framework\TestCase;

class EmailTest extends  TestCase {


    public function testProduct()
    {
        // $product = new Product(new Session);
        $session = new class implements SessionInterface {
            public function open() {}
            public function close() {}
            public function write($product)
            {
                echo 'mocked writing to the session '. $product;
            }
        };
        $product = new Product($session);
        $this->assertSame('product 1',$product->fetchProductById(1));
    }

}
