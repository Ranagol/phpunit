<?php

abstract class ProductAbstract {

    /**
     * This is the method that we want to test. But, since this is an abstract class, it can't be
     * instantiated, it can be only inherited.
     */
    public function doSomething()
    {
        return 'done!';
    }
}
