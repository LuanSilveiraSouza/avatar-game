<?php

namespace App\Database;

interface DBStrategy {
    public function connect(string $uri) : bool;
    public function disconnect() : bool;
}
