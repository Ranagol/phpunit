<?php

class User
{
    /**
     * private properties are not accessible out of the class. How to test it then in a tester 
     * class?
     */
    protected $name;
    protected $last_name;
 
    public function __construct($name, $last_name)
    {
        $this->name = ucfirst($name);
        $this->last_name = ucfirst($last_name);
    }
 
    public function getFullName()
    {
        return $this->name .' '. $this->last_name;
    }
}



