<?php

namespace App\Controllers;

include_once '../src/models/Question.php';
include_once '../src/ports/HttpCode.php';

use App\Models\Question;
use App\Ports\HttpCode;

class QuestionController
{
    static function getAll()
    {
        header(HttpCode::Http200);

        $questions = Question::findAll();

        echo json_encode($questions);
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['position']) && isset($input['content'])) {

            $question = new Question($input['position'], $input['content']);

            $result = $question->create();

            if ($result) {
                $msg = "Question created";
                header(HttpCode::Http201);
            } else {
                $msg = "Cannot create question";
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
        $result = Question::delete($id);
        $msg = "";

        if (isset($result)) {
            header(HttpCode::Http200);
            $msg = "Question deleted";
        } else {
            header(HttpCode::Http404);
            $msg = "Question not found";
        }

        echo json_encode(array("msg" => $msg));
    }
}
