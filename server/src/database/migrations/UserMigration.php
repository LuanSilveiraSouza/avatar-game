<?php

namespace App\Database\Migration;

include_once "Migration.php";

use App\Database\Migration;

class UserMigration implements Migration
{
    static function up(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR (50) NOT NULL,
            password VARCHAR (50),
            role ENUM('user', 'admin') NOT NULL
        );";

        $GLOBALS['database']->query($sql);

        $GLOBALS['database']->query("INSERT INTO users (name, password, role)
        VALUES ('Admin', 'admin', 'admin')");
    }

    static function down(): void
    {
        $GLOBALS['database']->query('DROP TABLE users;');
    }
}
