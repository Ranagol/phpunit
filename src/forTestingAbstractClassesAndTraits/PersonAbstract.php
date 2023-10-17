<?php

namespace forTestingAbstractClassesAndTraits;

abstract class PersonAbstract {

    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function showFullNameAndSalary()
    {
        return $this->firstName.' '.$this->lastName. ' earns '.$this->getSalary(). ' per month';
    }

    abstract public function getSalary();
}
