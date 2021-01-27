<?php

namespace App;

include_once '../src/controllers/UserController.php';
include_once '../src/ports/HttpCode.php';

use App\Controllers\UserController;
use App\Ports\HttpCode;

class Router
{

    public static function handleRequest($url, $method)
    {
        $resource = explode("/", $url);
        $request_processed = false;

        if (count($resource) >= 1) {
            if ($resource[1] == "users") {
                if ($method == "GET") {
                    if (isset($resource[2])) {
                        UserController::index($resource[2]);
                        $request_processed = true;
                    } else {
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
            }
        }

        if (!$request_processed) {
            header(HttpCode::Http404);
            echo json_encode(array("msg" => "Not found"));
        }
    }
}
