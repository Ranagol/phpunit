<?php

trait CustomAssertionTrait {

    /**
     * This here is our custom assertion, ment to test an array with ['nick', 'email', 'age'] keys.
     */
    public function assertArrayData(array $array)
    {
        //First we check if the ['nick', 'email', 'age'] keys exist.
        foreach (['nick', 'email', 'age'] as $key) {
            $this->assertArrayHasKey($key, $array, "Array doesn't contain the $key key.");
        }
        
        $this->assertIsString($array['nick'], 'Nick field must be a string');
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $array['email'], 'Email field must be a valid email');
        $this->assertIsInt($array['age'], 'Age field must be an integer');

    }
}