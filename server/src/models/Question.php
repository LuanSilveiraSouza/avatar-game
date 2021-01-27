<?php

namespace App\Models;

class Question
{
    public string $id;
    public string $position;
    public string $content;

    public function __construct(string $position, string $content, string $id = '')
    {
        $this->id = $id;
        $this->position = $position;
        $this->content = $content;
    }

    public function to_array()
    {
        return array("id" => $this->id, "position" => $this->position, "content" => $this->content);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO questions (position, content)
            VALUES (?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->position, $this->content));
    }

    static function findAll(): mixed
    {
        $sql = "SELECT * FROM questions;";

        return array_map(function ($value) {
            return array("id" => $value['id'], "position" => $value['position'], "content" => $value['content']);
        }, $GLOBALS['database']->query($sql)->fetchAll());
    }

    static function delete(string $id): mixed {
        $sql = "DELETE FROM questions WHERE id = ?;";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($id));
    }
}
