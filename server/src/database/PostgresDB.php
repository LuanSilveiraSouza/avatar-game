<?php

namespace App\Database;

use App\Database\DBStrategy;
use PDO;

include "DBStrategy.php";

class PostgresDB implements DBStrategy
{
    private string $uri;
    public $connection = null;

    public function connect(string $uri): bool
    {
        $this->uri = $uri;

        $this->connection = new PDO($this->uri);

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
