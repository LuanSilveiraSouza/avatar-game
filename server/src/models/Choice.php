<?php

namespace App\Models;

class Choice
{
    public string $id;
    public string $question_id;
    public string $content;
    public string $points;

    public function __construct(string $question_id, string $content, string $points, string $id = '')
    {
        $this->id = $id;
        $this->question_id = $question_id;
        $this->content = $content;
        $this->points = $points;
    }

    public function to_array()
    {
        return array("id" => $this->id, "question_id" => $this->question_id, "content" => $this->content, "points" => $this->points);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO choices (question_id, content, points)
            VALUES (?, ?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->question_id, $this->content, $this->points));
    }

    static function findByQuestion(string $id): mixed
    {
        $sql = "SELECT * FROM choices WHERE question_id = $id;";

        $result = $GLOBALS['database']->query($sql)->fetchAll();

        if ($result != false) {
            return array_map(function ($value) {
                return array("id" => $value['id'], "question_id" => $value['question_id'], "content" => $value['content'], "points" => $value['points']);
            }, $result);
        }
        return array();
    }

    static function delete(string $id): mixed
    {
        $sql = "DELETE FROM choices WHERE id = ?;";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($id));
    }
}
