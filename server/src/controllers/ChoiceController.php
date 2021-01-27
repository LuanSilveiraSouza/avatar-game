<?php

namespace App\Controllers;

include_once '../src/models/Choice.php';
include_once '../src/ports/HttpCode.php';

use App\Models\Choice;
use App\Ports\HttpCode;

class ChoiceController
{
    static function list(string $question_id)
    {
        header(HttpCode::Http200);

        $questions = Choice::findByQuestion($question_id);

        echo json_encode($questions);
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['question_id']) && isset($input['content']) && isset($input['points'])) {

            $choice = new Choice($input['question_id'], $input['content'], $input['points']);

            $result = $choice->create();

            if ($result) {
                $msg = "Choice created";
                header(HttpCode::Http201);
            } else {
                $msg = "Cannot create choice";
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
        $result = Choice::delete($id);
        $msg = "";

        if (isset($result)) {
            header(HttpCode::Http200);
            $msg = "Choice deleted";
        } else {
            header(HttpCode::Http404);
            $msg = "Choice not found";
        }

        echo json_encode(array("msg" => $msg));
    }
}