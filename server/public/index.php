<?php

include_once '../src/Router.php';
include_once '../src/database/DBConnection.php';
include_once '../src/database/MySqlDB.php';

use App\Router;
use App\Database\DBConnection;
use App\Database\MySqlDB;

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,UPDATE,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$request_method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$database = new DBConnection(new MySqlDB());
$database->connect("mysql:host=127.0.0.1;dbname=public", "root", "dockermysql");
$database->set_attributes();

session_start();

Router::handleRequest($uri, $request_method);