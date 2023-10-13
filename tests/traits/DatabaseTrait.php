<?php

/**
 * Creates and stores a db connection.
 */
trait DatabaseTrait
{
    // protected $cart;
    protected static $db_connection = false;

    /**
     * @beforeClass
     * Instead of the official setUpBeforeClass(), we can also use the beforeClass annotation.
     * 
     * This method will be called only once, before running the first test method. So, no matter how 
     * many test methods we have, this method will be called ony once, at the very beginning. The
     * $db_connection is stored in the class, so it it not lost when the object is destroyed.
     */
    public static function createDatabase()
    {
        if (self::$db_connection) {
            return;
        }
        try {
            // self::$db_connection = new \PDO('sqlite::database.db');
            self::$db_connection = new PDO("mysql:host=localhost;dbname=breeze", "root", "");
            echo "Connected successfully" . PHP_EOL;
        } catch (\Throwable $th) {
            echo "Connection failed: " . $th->getMessage() . PHP_EOL;
        }
    }

    /**
     * @afterClass
     * Instead of the official tearDownAfterClass(), we can also use afterClass annotation.
     * 
     * This will be called after the last test was run, and it will be called only once. Here we 
     * destroy our db connection, because we are done with the testing.
     */
    public static function deleteDatabase()
    {
        self::$db_connection = null;
        // unlink(':database.db');
    }
}
