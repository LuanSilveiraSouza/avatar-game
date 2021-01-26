<?php

namespace App\Database\Migration;

include_once "Migration.php";
use App\Database\Migration;

class UserMigration implements Migration {
    static function up(): void {
        $sql = "CREATE TABLE users (
            id INT NOT NULL PRIMARY KEY
        );";

        $GLOBALS['database']->query($sql);
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE users;');
    }
}