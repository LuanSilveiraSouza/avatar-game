<?php

namespace App\Database\Migration;

include_once "Migration.php";
use App\Database\Migration;

class DestinyMigration implements Migration {
    static function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS destinies (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content VARCHAR (200),
            min_score INT,
            max_score INT
        );";

        $GLOBALS['database']->query($sql);
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE destinies;');
    }
}