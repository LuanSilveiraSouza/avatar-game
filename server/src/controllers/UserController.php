<?php

namespace App\Controllers;

include_once '../src/models/User.php';
include_once '../src/database/PostgresDB.php';

use App\Models\User;
use App\Database\PostgresDB;

class UserController
{
    static function list()
    {
        $user_array = array(new User('Admin1', 'admin'), new User('User1', 'user'), new User('User2', 'user'));

        header('HTTP/1.1 200 OK');

        $database = new PostgresDB();

        $database->connect("pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=phppostgres");

        echo json_encode($user_array);
    }
}
