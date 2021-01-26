<?php

namespace App\Database;

include_once "DBStrategy.php";

use App\Database\DBStrategy;

class DBConnection
{
    public $db = null;

    public function __construct(DBStrategy $db)
    {
        $this->db = $db;
    }

    public function setDb(DBStrategy $db)
    {
        $this->db = $db;
    }

    public function connect(string $uri, string $user, string $password)
    {
        $this->db->connect($uri, $user, $password);
    }

    public function disconnect()
    {
        $this->db->disconnect();
    }

    public function query(string $sql) 
    {
        return $this->db->connection->query($sql);
    }
}
