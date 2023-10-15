<?php

class Session implements SessionInterface {

    public function open()
    {
        echo 'real opening the session';
    }
    public function close()
    {
        echo 'real closing the session';
    }
    public function write($product)
    {
        /**
         * This is a sign, that in testing we used real session, which is bad. In testing here
         * we want to use a mock session, created with an anon. class.
         */
        echo 'real writing to the session '. $product;
    }
}
