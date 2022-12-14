<?php

class Connection
{
    public $host = 'localhost';
    public $dbname = 'asi';
    public $port = '5432';
    public $username = 'postgres';
    public $password = '123456';
    public $driver = 'pgsql';
    public $connect;

    public static function getConnection()
    {
        try {
            $connection = new Connection();
            $connection->connect = new PDO("{$connection->driver}:host={$connection->host}; port={$connection->port};dbname={$connection->dbname}", $connection->username, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connection success";
            return $connection->connect;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

Connection::getConnection();
