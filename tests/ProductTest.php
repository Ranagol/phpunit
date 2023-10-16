<?php
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {

    public function testProduct()
    {
        // $product = new Product(new Session);

        /**
         * Here we create an anonym. class, that implement the SessionInterface. The open na close 
         * functions are defined here... though they are not doing anything. So, we are NOT using
         * the real Session class. Instead, we use a fake mock anonym class.
         */
        $mockedSession = new class implements SessionInterface {
            public function open() {}
            public function close() {}

            public function write($product)
            {
                /**
                 * If we see this in the terminal, that means that we used our mockedSession
                 * during testing, which is good. Bad would have been if we would have used the real
                 * session. Using a real session during testing will slow down the testing.
                 */
                echo 'mocked writing to the mockedSession '. $product . PHP_EOL;
            }
        };

        $product = new Product($mockedSession);

        /**
         * I guess here we call... Fuck.
         */
        $product->setLoggerCallable( function(){
            echo 'Real Logger was NOT called!' . PHP_EOL;
        });

        /**
         * This is our actual testing.
         */
        $this->assertSame('product 1', $product->fetchProductById(1));
    }

    public function testAnother()
    {
        //Incomplete test example
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
        
        if (!extension_loaded('xdebug'))
        {
            //Skipped test example
            $this->markTestSkipped(
              'The Xdebug extension is not available.'
            );
        }

        $this->assertTrue(true);
    }



}
