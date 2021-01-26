<?php

namespace App\Models;

class User
{
    public string $name;
    protected string $password;
    public string $role;

    public function __construct(string $name, string $role, string $password = '')
    {
        $this->name = $name;
        $this->role = $role;
        $this->password = $password;
    }

    function setPassword(string $password)
    {
        $this->password = $password;
    }

    function create(): mixed
    {
        $sql = "INSERT INTO users (name, password, role)
            VALUES (?, ?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->name, $this->password, $this->role));
    }

    static function findAll(): mixed
    {
        $sql = "SELECT * FROM users;";

        return array_map(function ($value) {
            return array("id" => $value['id'], "name" => $value['name'], "password" => $value['password'], "role" => $value['role']);
        }, $GLOBALS['database']->query($sql)->fetchAll());
    }
}
