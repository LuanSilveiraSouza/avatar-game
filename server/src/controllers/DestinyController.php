<?php

namespace App\Controllers;

include_once '../src/models/Destiny.php';
include_once '../src/ports/HttpCode.php';

use App\Models\Destiny;
use App\Ports\HttpCode;

class DestinyController
{
    static function getAll()
    {
        header(HttpCode::Http200);

        $destinies = Destiny::findAll();

        echo json_encode($destinies);
    }

    static function index(string $score)
    {
        $destiny = Destiny::findByScore($score);

        if (isset($destiny)) {
            header(HttpCode::Http200);
            echo json_encode($destiny->to_array());
        } else {
            header(HttpCode::Http404);
            echo json_encode(array("msg" => "Destiny not found"));
        }
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['content']) && isset($input['min_score']) && isset($input['max_score'])) {

            $destiny = new Destiny($input['content'], $input['min_score'], $input['max_score']);

            $result = $destiny->create();

            if ($result) {
                $msg = "Destiny created";
                header(HttpCode::Http201);
            } else {
                $msg = "Cannot create destiny";
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
        $result = Destiny::delete($id);
        $msg = "";

        if (isset($result)) {
            header(HttpCode::Http200);
            $msg = "Destiny deleted";
        } else {
            header(HttpCode::Http404);
            $msg = "Destiny not found";
        }

        echo json_encode(array("msg" => $result));
    }
}