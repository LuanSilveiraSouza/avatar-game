<?php

namespace App\Controllers;

include_once '../src/models/User.php';
include_once '../src/ports/HttpCode.php';

use App\Models\User;
use App\Ports\HttpCode;

class UserController
{
    static function list()
    {
        header(HttpCode::Http200);

        $users = User::findAll();

        echo json_encode($users);
    }

    static function index(string $id)
    {
        $user = User::find($id);

        if (isset($user)) {
            header(HttpCode::Http200);
            echo json_encode($user->to_array());
        } else {
            header(HttpCode::Http404);
            echo json_encode(array("msg" => "User not found"));
        }
    }

    static function create()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $msg = "";

        if (isset($input['name']) && isset($input['password']) && isset($input['role'])) {

            $user = new User($input['name'], $input['role'], $input['password']);

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

    static function update(string $id)
    {
        $user = User::find(intval($id));
        $msg = "";

        if (isset($user)) {
            $input = (array) json_decode(file_get_contents('php://input'), TRUE);

            if (isset($input['name']) && isset($input['password'])) {
                $result = $user->update($input['name'], $input['password']);

                if ($result) {
                    $msg = "User Updated";
                    header(HttpCode::Http200);
                } else {
                    $msg = "Cannot update user";
                    header(HttpCode::Http400);
                }
            } else {
                $msg = "Not enough body parameters";
                header(HttpCode::Http400);
            }
        } else {
            $msg = "Not enough body parameters";
            header(HttpCode::Http404);
        }

        echo json_encode(array("msg" => $msg));
    }

    static function delete(string $id)
    {
        $result = User::delete($id);
        $msg = "";

        if (isset($result)) {
            header(HttpCode::Http200);
            $msg = "User deleted";
        } else {
            header(HttpCode::Http404);
            $msg = "User not found";
        }

        echo json_encode(array("msg" => $msg));
    }
}
