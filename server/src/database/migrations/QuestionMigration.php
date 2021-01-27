<?php

namespace App\Database\Migration;

include_once "Migration.php";
use App\Database\Migration;

class QuestionMigration implements Migration {
    static function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS questions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content VARCHAR (200),
            position INT);";

        $GLOBALS['database']->query($sql);
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE questions;');
    }
}