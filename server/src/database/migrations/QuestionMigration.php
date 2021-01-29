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

        $GLOBALS['database']->query("INSERT INTO questions (position, content)
        VALUES (1, 'First, wich element do you bend?')");
        $GLOBALS['database']->query("INSERT INTO questions (position, content)
        VALUES (2, 'Who is gonna be you partner in this adventure?')");
        $GLOBALS['database']->query("INSERT INTO questions (position, content)
        VALUES (3, 'You are at a dense forest and hear a noise, what you will do?')");
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE questions;');
    }
}