<?php

namespace App\Models;

class Question
{
    public string $id;
    public string $position;

    public function __construct(string $position, string $id = '')
    {
        $this->id = $id;
        $this->position = $position;
    }

    public function to_array()
    {
        return array("id" => $this->id, "position" => $this->position);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO questions (position)
            VALUES (?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->position));
    }

    static function findAll(): mixed
    {
        $sql = "SELECT * FROM questions;";

        return array_map(function ($value) {
            return array("id" => $value['id'], "position" => $value['position']);
        }, $GLOBALS['database']->query($sql)->fetchAll());
    }

    static function delete(string $id): mixed {
        $sql = "DELETE FROM questions WHERE id = ?;";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($id));
    }
}
