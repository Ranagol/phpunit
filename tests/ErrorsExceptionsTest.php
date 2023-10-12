<?php
use BMICalculator;
use PHPUnit\Framework\TestCase;

class ErrorsExceptionsTest extends TestCase {

    /**
     * Here we test standard php errors. We expect a php error to be produced.
     */
    public function testErrorCanBeExpected(): void
    {   
        /**
         * This means literally: after this line of code, expect a php error that will happen. So,
         * after this line, we must create a situation that will lead to a php error. Because this
         * line is expectin a php error.
         */
        $this->expectError();

        // $this->expectErrorMessage('foo');//this might be deleted???????????????????????????????????????????

        /**
         * This is a built in php function. It artificially creates an error, that is expected at the
         * line with 
         * $this->expectError();
         * 
         * https://www.w3schools.com/php/func_error_trigger_error.asp
         */
        \trigger_error('foo', \E_USER_ERROR);

        /**
         * This is another way of us creating an error. Here we try to open a non existing file, 
         * which should create a php error message. This error is actually expected at the
         * line with 
         * $this->expectError();
         */
        $file = fopen("test.txt", "r");
    }

    /**
     * Here we test exceptions. We expect an exception to be produced.
     */
    public function testExceptionCanBeExpected()
    {   
        //From now on we expect this  expection to be thrown
        $this->expectException(WrongBmiDataException::class);

        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 0; // kg
        $BMICalculator->height = 1.6; // m
        $BMICalculator->calculate();// since the mass is 0, this should throw here an exception
    }

}
