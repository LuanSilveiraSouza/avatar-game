<?php

namespace App;

include_once '../src/controllers/UserController.php';
use App\Controllers\UserController;

class Router {
    
    public static function handleRequest($url, $method) {
        $resource = explode("/", $url);

        if (count($resource) >= 1) {
            if($resource[1] == "users") {
                if($method == "GET") {
                    UserController::list();
                } else if($method == "POST") {
                    UserController::create();
                }
            }
        } 
    }
}