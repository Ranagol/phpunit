<?php

class Database {

    public function getEmailAndLastName()
    {
        echo 'real db touched';
    }
}

class User
{
    /**
     * private properties are not accessible out of the class. How to test it then in a tester 
     * class?
     */
    protected $name;
    private $last_name;
    private $db;
 
    public function __construct($name, $last_name)
    {
        $this->name = ucfirst($name);
        $this->last_name = ucfirst($last_name);
        $this->db = new Database();
    }
 
    public function getFullName()
    {
        $this->db->getEmailAndLastName();//echo 'real db touched';
        return $this->name .' '. $this->last_name;
    }

    private function triggerPrivateFunction()
    {
        return 'private function accessed!';
    }

    protected function triggerProtectedFunction()
    {
        return 'protected function accessed!';
    }
}



