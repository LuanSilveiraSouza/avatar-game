<?php

namespace App\Database\Migration;

include_once "Migration.php";
use App\Database\Migration;

class ChoiceMigration implements Migration {
    static function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS choices (
            id INT AUTO_INCREMENT PRIMARY KEY,
            question_id INT NOT NULL,
            content VARCHAR (200),
            points INT,
            CONSTRAINT fk_question_id FOREIGN KEY (question_id) REFERENCES questions(id)
        );";

        $GLOBALS['database']->query($sql);
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE choices;');
    }
}