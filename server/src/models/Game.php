<?php

namespace App\Models;

class Game
{
    public string $id;
    public string $user_id;
    public string $destiny_id;
    public string $score;

    public function __construct(string $score, string $user_id = '', string $destiny_id = '',  string $id = '')
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->destiny_id = $destiny_id;
        $this->score = $score;
    }

    public function to_array()
    {
        return array("id" => $this->id, "user_id" => $this->user_id, "destiny_id" => $this->destiny_id, "score" => $this->score);
    }

    function create(): mixed
    {
        $sql = "INSERT INTO games (user_id, destiny_id, score)
            VALUES (?, ?, ?);";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($this->user_id, $this->destiny_id, $this->score));
    }

    static function findByUser(string $id): mixed
    {
        $sql = "SELECT * FROM games INNER JOIN destinies ON games.user_id = $id AND games.destiny_id = destinies.id;";

        $result = $GLOBALS['database']->query($sql)->fetchAll();

        if ($result != false) {
            return array_map(function ($value) {
                return array("id" => $value['id'], "user_id" => $value['user_id'], "destiny_id" => $value['destiny_id'], "score" => $value['score'], "destiny_content" => $value['content']);
            }, $result);
        }
        return array();
    }

    static function delete(string $id): mixed
    {
        $sql = "DELETE FROM games WHERE id = ?;";

        $query = $GLOBALS['database']->prepare($sql);
        return $query->execute(array($id));
    }
}
