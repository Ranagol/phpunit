<?php

class Logger {

    /**
     * This is the static method that we want to test.
     */
    public static function log($data)
    {
        echo $data.' logged, logger triggered!' . PHP_EOL;
    }
}
