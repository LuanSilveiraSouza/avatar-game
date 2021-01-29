<?php

namespace App\Models;

class Destiny
{
    public string $id;
    public string $content;
    public string $min_score;
    public string $max_score;

    public function __construct(string $content, string $min_score, string $max_score, string $id = '')
    {
        $this->id = $id;
        $this->content = $content;
        $this->min_score = $min_score;
        $this->max_score = $max_score;
    }

    public function to_array()
    {
        return array("id" => $this->id, "content" => $this->content, "min_score" => $this->min_score, "max_score" => $this->max_score);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO destinies (content, min_score, max_score)
            VALUES (?, ?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->content, $this->min_score, $this->max_score));
    }

    static function findAll(): mixed
    {
        $sql = "SELECT * FROM destinies;";

        return array_map(function ($value) {
            return array("id" => $value['id'], "content" => $value['content'], "min_score" => $value['min_score'], "max_score" => $value['max_score']);
        }, $GLOBALS['database']->query($sql)->fetchAll());
    }

    static function findByScore(string $score): mixed
    {
        $sql = "SELECT * FROM destinies WHERE min_score <= $score && max_score >= $score;";

        $result = $GLOBALS['database']->query($sql)->fetch();

        if ($result != false) {
            return new Destiny($result['content'], $result['min_score'], $result['max_score'], $result['id']);
        }
        return null;
    }

    static function delete(string $id): mixed
    {
        $sql = "DELETE FROM destinies WHERE id = $id;";

        return $GLOBALS['database']->query($sql)->fetchAll();
    }
}
