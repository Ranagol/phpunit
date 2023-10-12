<?php

/**
 * BMI = Body mass index. This class works/calculates the BMI.
 */
class BMICalculator {

    public $mass;
    public $height;
    public $BMI;

    /**
     * Calulates the BMI for a person, based on person's weight and height.
     */
    public function calculate()
    {
        if ($this->mass <= 0 || $this->height <= 0) {
            throw new WrongBmiDataException('Our custom error message');
        }
        return round ( $this->mass / pow($this->height,2), 1 );
    }

    /**
     * Returns underweight/normal/owerweight based on the BMI value of a person.
     */
    public function getTextResultFromBMI()
    {
        if($this->BMI < 18)
        return 'Underweight';
        elseif($this->BMI >= 18 && $this->BMI <= 25)
        return 'Normal';
        else 
        return 'Overweight';
    }

}
