<?php

use PHPUnit\Framework\TestCase;
use forStubMockTesting\Product;
use forStubMockTesting\Logger;

/**
 * We test here the Product class. The Product class is full of some validation methods, that all
 * trigger the Logger class at some point. But, in testing, we do not want to trigger the real
 * Logger class.
 */
class ProductMockTest extends  TestCase {
  
    public function testSaveProductWithWrongData()
    {
        /**
         * testSaveProductWithWrongData() is a method where we test, but with wrong data. Price is 
         * 'price' here, which is a string, but it should be integer. So, this is wrong on purpose.
         * Because price is wrong, the validation in the real Logger would kick in, once only.
         * This is exactly the same behaviour that we expect from our $loggerMock.
         */
        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->once()) // we expect only once...
                                        ->method('log')// ...the log() method.
                                        ->with(//log() expects two arguments. We provide them below.
                                            $this->equalTo('error'),//because this would be 'error' message type 
                                            $this->equalTo('Invalid price')
                                        );
        
        /**
         * Pay attention. When a product is created, it must receive a Logger class object. But here,
         * instead of the real Logger object, we give the mock $loggerMock object.
         */
        $product = new Product($loggerMock);

        /**
         * This final step triggers everything that we set up in the previous lines.
         */
        $product->saveProduct('Panasonic', 'price');
    }

    /**
     * testSaveProductWithCorrectData() it the testing with the correct data. Here price is an 
     * integer. And bigger than 10. The real Logger woould create two logs in this case. This is the
     * same thing that we expect from our $loggerMock.
     * 
     */
    public function testSaveProductWithCorrectData()
    {
        $loggerMock = $this->createMock(Logger::class);
        $loggerMock->expects($this->exactly(2))//we expect the mock Logger to be triggered exactly twice
            ->method('log')
            ->withConsecutive(//one after the other, in order. 
                [//First we will have this mock logging
                    $this->equalTo('notice'), 
                    $this->stringContains('greater than 10')
                ],
                [//And this is the second mock logging, that comes after the first mock logging
                    $this->equalTo('success'), 
                    $this->stringContains('was saved')
                ],
            );

        /**
         * Pay attention. When a product is created, it must receive a Logger class object. But here,
         * instead of the real Logger object, we give the mock $loggerMock object.
         */
        $product = new Product($loggerMock);

        /**
         * This final step triggers everything that we set up in the previous lines.
         */
        $product->saveProduct('Panasonic', 11);
    }
}
