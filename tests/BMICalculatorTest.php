<?php
use BMICalculator;
use PHPUnit\Framework\TestCase;//This i PU default class, needed for all testings

class BMICalculatorTest extends TestCase {

    /**
     * Testing undeweight option
     */
    public function testUnderweightBMITextResult()
    {
        $expected = 'Underweight';//This is what we expect as a result
        $BMICalculator = new BMICalculator;//Creating a new object that we want to test
        $BMICalculator->BMI = 10;//Setting BMI value, that should lead to 'Underweight'
        $result = $BMICalculator->getTextResultFromBMI();//triggering the function for testing
        $this->assertSame($expected, $result);//$expected, $result should be same, 'Underweight'

    }

    /**
     * Testing normal option
     */
    public function testNormalBMITextResult()
    {
        $expected = 'Normal';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;
        $result = $BMICalculator->getTextResultFromBMI();
        $this->assertSame($expected, $result);

    }

    /**
     * Testing overweight option
     */
    public function testShowsOverweightWhentBMITextResult()
    {
        $expected = 'Overweight';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 28;
        $result = $BMICalculator->getTextResultFromBMI();
        $this->assertSame($expected, $result);

    }

    /**
     * Testing the calculation process of the BMI. We set some values for weight and height, and 
     * then we expect the result to be exaclty 39.1.
     */
    public function testCanCalculateCorrectBMIValue()
    {
        $expected = 39.1;
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 100; // kg
        $BMICalculator->height = 1.6; // m
        $result = $BMICalculator->calculate();
        $this->assertEquals($expected, $result);
    }
}

