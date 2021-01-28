<?php

namespace App;

include_once '../src/controllers/UserController.php';
include_once '../src/controllers/QuestionController.php';
include_once '../src/controllers/ChoiceController.php';
include_once '../src/controllers/DestinyController.php';
include_once '../src/controllers/GameController.php';
include_once '../src/ports/HttpCode.php';

use App\Controllers\UserController;
use App\Controllers\QuestionController;
use App\Controllers\ChoiceController;
use App\Controllers\DestinyController;
use App\Controllers\GameController;
use App\Ports\HttpCode;

class Router
{

    public static function handleRequest($url, $method)
    {
        $resource = explode("/", $url);
        $request_processed = false;

        if (count($resource) >= 1) {
            if ($resource[1] == "login" && $method == "POST") {
                UserController::login();
                $request_processed = true;
            } else if ($resource[1] == "logout" && $method == "GET") {
                $_SESSION = array();
                session_destroy();
                $request_processed = true;
                header(HttpCode::Http200);
                echo json_encode(array("msg" => "Logged out"));
            } else if ($resource[1] == "users") {
                if ($method == "GET") {
                    if (isset($resource[2])) {
                        UserController::index($resource[2]);
                        $request_processed = true;
                    } else if (isset($_SESSION['user_id'])) {
                        UserController::list();
                        $request_processed = true;
                    }
                } else if ($method == "POST") {
                    UserController::create();
                    $request_processed = true;
                } else if ($method == "PUT" && isset($resource[2])) {
                    UserController::update($resource[2]);
                    $request_processed = true;
                } else if ($method == "DELETE" && isset($resource[2])) {
                    UserController::delete($resource[2]);
                    $request_processed = true;
                }
            } else if ($resource[1] == "questions") {
                if ($method == "GET") {
                    QuestionController::list();
                    $request_processed = true;
                } else if ($method == "POST") {
                    QuestionController::create();
                    $request_processed = true;
                } else if ($method == "DELETE" && isset($resource[2])) {
                    QuestionController::delete($resource[2]);
                    $request_processed = true;
                }
            } else if ($resource[1] == "choices") {
                if ($method == "GET" && isset($resource[2])) {
                    ChoiceController::list($resource[2]);
                    $request_processed = true;
                } else if ($method == "POST") {
                    ChoiceController::create();
                    $request_processed = true;
                } else if ($method == "DELETE" && isset($resource[2])) {
                    ChoiceController::delete($resource[2]);
                    $request_processed = true;
                }
            } else if ($resource[1] == "destinies") {
                if ($method == "GET") {
                    if (isset($resource[2])) {
                        DestinyController::index($resource[2]);
                        $request_processed = true;
                    } else {
                        DestinyController::list();
                        $request_processed = true;
                    }
                } else if ($method == "POST") {
                    DestinyController::create();
                    $request_processed = true;
                } else if ($method == "DELETE" && isset($resource[2])) {
                    DestinyController::delete($resource[2]);
                    $request_processed = true;
                }
            } else if ($resource[1] == "games") {
                if ($method == "GET" && isset($resource[2])) {
                    GameController::list($resource[2]);
                    $request_processed = true;
                } else if ($method == "POST") {
                    GameController::create();
                    $request_processed = true;
                } else if ($method == "DELETE" && isset($resource[2])) {
                    GameController::delete($resource[2]);
                    $request_processed = true;
                }
            }
        }

        if (!$request_processed) {
            header(HttpCode::Http404);
            echo json_encode(array("msg" => "Not found"));
        }
    }
}
