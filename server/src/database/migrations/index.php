<?php

namespace App\Database\Migration;

require_once __DIR__ . "/UserMigration.php";
require_once __DIR__ . "/../DBConnection.php";
require_once __DIR__ . "/../MySqlDB.php";

use App\Database\DBConnection;
use App\Database\MySqlDB;
use App\Database\Migration\UserMigration;

$database = new DBConnection(new MySqlDB());
$database->connect("mysql:host=127.0.0.1;dbname=public", "root", "dockermysql");

class MigrationAgreggator
{
    static function up(): void
    {
        UserMigration::up();
    }

    static function down(): void
    {
        UserMigration::down();
    }
}

$response = readline("Database Migration (U for up/D for down): ");

switch (strtolower($response)) {
    case 'u':
        echo "Tables up... \n";
        MigrationAgreggator::up();
        break;
    case 'd':
        echo "Tables down... \n";
        MigrationAgreggator::down();
        break;
    default:
        echo "Wrong input \n";
}
