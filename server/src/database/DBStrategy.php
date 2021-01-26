<?php

namespace App\Database;

interface DBStrategy {
    public function connect(string $uri, string $user, string $password) : bool;
    public function disconnect() : bool;
}
