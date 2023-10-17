<?php

namespace forStubMockTesting;

class Product
{
    public $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * This function has a hardocoded, ugly validation, which is only for demonstrating purpose.
     * Whenever there is a validation error, the method will simply return false, and when the
     * validation is ok, this method will return true. This is important, because we will need this
     * info during testing.
     */
    public function saveProduct($name, $price)
    {
        if (!is_string($name)){
            $this->logger->log('error', 'Invalid name');
            return false;//when there is a validation error, this returns false
        } elseif (!is_int($price)){
            $this->logger->log('error', 'Invalid price');
            return false;//when there is a validation error, this returns false
        }

        if($price > 10){
            $this->logger->log('notice', 'Price greater than 10');
        }

        $this->logger->log('success', 'Product was saved');
        return true;
    }
}

