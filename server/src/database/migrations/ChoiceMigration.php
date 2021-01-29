<?php

namespace App\Database\Migration;

include_once "Migration.php";

use App\Database\Migration;

class ChoiceMigration implements Migration
{
    static function up(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS choices (
            id INT AUTO_INCREMENT PRIMARY KEY,
            question_id INT NOT NULL,
            content VARCHAR (200),
            points INT,
            CONSTRAINT fk_question_id FOREIGN KEY (question_id) REFERENCES questions(id)
        );";

        $GLOBALS['database']->query($sql);

        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (1, 'Water', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (1, 'Fire', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (1, 'Earth', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (1, 'Air', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (1, 'None', 1)");

        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (2, 'Katara', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (2, 'Zuko', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (2, 'Sokka', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (2, 'Toph', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (2, 'Iroh', 2)");

        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (3, 'Go after the noise', 0)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (3, 'Try to initiate a conversation', 1)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (3, 'Prepare to fight', 2)");
        $GLOBALS['database']->query("INSERT INTO choices (question_id, content, points)
        VALUES (3, 'Hide in the shadows', 3)");
    }

    static function down(): void
    {
        $GLOBALS['database']->query('DROP TABLE choices;');
    }
}
