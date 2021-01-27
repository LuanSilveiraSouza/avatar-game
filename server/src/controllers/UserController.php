<?php

namespace App\Controllers;

include_once '../src/models/User.php';
include_once '../src/ports/HttpCode.php';

use App\Models\User;
use App\Ports\HttpCode;
use Exception;

class UserController
{
    static function list()
    {
        header(HttpCode::Http200);

        $users = User::findAll();

        echo json_encode($users);
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['name']) && isset($input['password']) && isset($input['role'])) {

            $user = new User($input['name'], $input['password'], $input['role']);

            $result = $user->create();

            if ($result) {
                $msg = "User Created";
                header(HttpCode::Http201);
            } else {
                $msg = "Cannot create user";
                header(HttpCode::Http400);
            }
        } else {
            $msg = "Not enough body parameters";
            header(HttpCode::Http400);
        }

        echo json_encode(array("msg" => $msg));
    }
}
