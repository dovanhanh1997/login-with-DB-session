<?php


class DBConnect
{
    public $dsn;
    public $username;
    public $password;
    public $connection;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=login_with_database";
        $this->username = "hanhphp";
        $this->password = "dovanHanh1997";

    }

    public function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $exception) {
            return 'Connect ERROR: ' . $exception->getMessage();
        }
    }

    public function closeConnect()
    {
        $this->connection = null;
    }
}

