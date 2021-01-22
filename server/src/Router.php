<?php

namespace App;

include_once '../src/models/User.php';
use App\Models\User;

class Router {
    
    public static function handleRequest($url, $method) {
        $user = new User('User', 'Admin');

        header('HTTP/1.1 200 OK');
        $response['user'] = $user;
        
        echo json_encode($response);
    }
}