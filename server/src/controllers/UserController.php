<?php

namespace App\Controllers;

include_once '../src/models/User.php';

use App\Models\User;

class UserController
{
    static function list()
    {
        header('HTTP/1.1 200 OK');

        $users = User::findAll();

        echo json_encode($users);
    }

    static function create()
    {

        $user = new User('User1', 'user', '000');

        $result = $user->create();

        $msg = "";

        if ($result) {
            $msg = "User Created";
            header('HTTP/1.1 201 CREATED');
        } else {
            $msg = "User Created";
            header('HTTP/1.1 400 BAD REQUEST');
        }

        echo json_encode(array("msg" => $msg));
    }
}
