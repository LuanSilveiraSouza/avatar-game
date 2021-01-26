<?php

namespace App\Models;

class User
{
    public string $name;
    protected string $password;
    public string $role;

    public function __construct(string $name, string $role, string $password = '')
    {
        $this->$name = $name;
        $this->$role = $role;
        $this->$password = $password;
    }

    function setPassword(string $password)
    {
        $this->password = $password;
    }
}
