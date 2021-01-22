<?php

namespace App\Models;

class User {
    public string $name;
    protected string $password;
    public string $role;

    public function __construct(string $name, string $role)
    {
        $this->$name = $name;
        $this->$role = $role;
    }
}