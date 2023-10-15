<?php

/**
 * Interface for session handling.
 */
interface SessionInterface {

    public function open();//to open the session
    public function close();//to close the session
    public function write($product);//to write something into session, example a product added into the shopping cart
}
