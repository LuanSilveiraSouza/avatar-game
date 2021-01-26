<?php

namespace App\Controllers;

include_once '../src/models/User.php';
use App\Models\User;

class UserController
{
    static function list()
    {
        $user_array = array(new User('Admin1', 'admin'), new User('User1', 'user'), new User('User2', 'user'));

        header('HTTP/1.1 200 OK');

        $result = $GLOBALS['database']->query('SHOW DATABASES;');

        echo json_encode($result);
    }
}
