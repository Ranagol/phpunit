<?php

namespace forStubMockTesting;

/**
 * So, we want to test this class. The problem is, that whenever we create a user, it will be written
 * into the db, with the save(). We do not want that. We want to use a replacement, a stub in testing
 * instead the user object.
 */
class User {
    public $name;
    public $email;

    public function __construct()
    {
        echo 'constructor was called!';
    }

    public function createUser($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
        if($this->validate()){
            return $this->save();
        } else {
            return false;
        }
    }

    public function validate()
    {
        if(!empty($this->name) && filter_var($this->email, FILTER_VALIDATE_EMAIL))
        return true;
        else
        return false;
    }


    public function save()
    {
        echo 'User was saved in database - real operation!';
        return true;
    }
}
