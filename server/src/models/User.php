<?php

namespace App\Models;

use Exception;

class User
{
    public string $id;
    public string $name;
    protected string $password;
    public string $role;

    public function __construct(string $name, string $role = 'user', string $password = '', string $id = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;

        if ($role != 'admin') {
            $this->role = 'user';
        } else {
            $this->role = 'admin';
        }
    }

    function set_password(string $password)
    {
        $this->password = $password;
    }

    public function to_array()
    {
        return array("id" => $this->id, "name" => $this->name, "password" => $this->password, "role" => $this->role);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO users (name, password, role)
            VALUES (?, ?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->name, $this->password, $this->role));
    }

    function update(string $name = '', string $password = ''): mixed
    {
        if ($name != '') {
            $this->name = $name;
        }

        if ($password != '') {
            $this->password = $password;
        }

        $sql = "UPDATE users 
            SET name = ?, password = ?
            WHERE id = ?";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->name, $this->password, $this->id));
    }

    static function find(string $id): mixed
    {
        $sql = "SELECT * FROM users WHERE id = $id;";

        $result = $GLOBALS['database']->query($sql)->fetch();

        if ($result != false) {
            return new User($result['name'], $result['role'], $result['password'], $result['id']);
        }
        return null;
    }

    static function findAll(): mixed
    {
        $sql = "SELECT * FROM users;";

        return array_map(function ($value) {
            return array("id" => $value['id'], "name" => $value['name'], "password" => $value['password'], "role" => $value['role']);
        }, $GLOBALS['database']->query($sql)->fetchAll());
    }

    static function delete(string $id): mixed
    {
        $sql = "DELETE FROM users WHERE id = ?;";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($id));
    }
}
