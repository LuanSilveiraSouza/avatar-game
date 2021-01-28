<?php

namespace App\Controllers;

include_once '../src/models/Game.php';
include_once '../src/ports/HttpCode.php';

use App\Models\Game;
use App\Ports\HttpCode;

class GameController
{
    static function list(string $user_id)
    {
        header(HttpCode::Http200);

        $games = Game::findByUser($user_id);

        echo json_encode($games);
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['user_id']) && isset($input['destiny_id']) && isset($input['score'])) {

            $game = new Game($input['score'], $input['user_id'], $input['destiny_id']);

            $result = $game->create();

            if ($result) {
                $msg = "Game created";
                header(HttpCode::Http201);
            } else {
                $msg = "Cannot create game";
                header(HttpCode::Http400);
            }
        } else {
            $msg = "Not enough body parameters";
            header(HttpCode::Http400);
        }

        echo json_encode(array("msg" => $msg));
    }

    static function delete(string $id)
    {
        $result = Game::delete($id);
        $msg = "";

        if (isset($result)) {
            header(HttpCode::Http200);
            $msg = "Game deleted";
        } else {
            header(HttpCode::Http404);
            $msg = "Game not found";
        }

        echo json_encode(array("msg" => $msg));
    }
}