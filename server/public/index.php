<?php

include_once '../src/Router.php';
include_once '../src/database/DBConnection.php';
include_once '../src/database/MySqlDB.php';

use App\Router;
use App\Database\DBConnection;
use App\Database\MySqlDB;

header('Access-Control-Allow-Credentials: true');

if (isset($_SERVER["HTTP_ORIGIN"])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
} else {
    header("Access-Control-Allow-Origin: *");
}

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$request_method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$database = new DBConnection(new MySqlDB());
$database->connect("mysql:host=127.0.0.1;dbname=public", "root", "dockermysql");
$database->set_attributes();

session_start();

Router::handleRequest($uri, $request_method);
