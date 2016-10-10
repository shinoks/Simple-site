<?php

class DbConn
{
    protected static $db;
    protected static $hash2;

    private function __construct()
    {
        try {
            $user = '05053772_0000020';
            $pass = '4JzrGs*iTlee';
            self::$db = new PDO('mysql:host=localhost;dbname=' . $user . ';charset=utf8', $user, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->query('SET NAMES utf8');
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }

    public static function getConnection()
    {
        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            new dbConn();
        }
        return self::$db;
    }
}

?>
