<?php

namespace App\Database;

include_once "DBStrategy.php";
use App\Database\DBStrategy;
use PDO;

class MySqlDB implements DBStrategy
{
    private string $uri;
    private string $user;
    private string $password;
    public $connection = null;

    public function connect(string $uri, string $user, string $password): bool
    {
        $this->uri = $uri;
        $this->user = $user;
        $this->password = $password;

        $this->connection = new PDO($this->uri, $this->user, $this->password);

        return true;
    }

    public function disconnect(): bool
    {
        if ($this->connection != null) {
            $this->connection = null;
        }
        return true;
    }
}
