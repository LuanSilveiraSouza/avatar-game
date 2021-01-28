<?php

namespace App\Database\Migration;

include_once "Migration.php";
use App\Database\Migration;

class GameMigration implements Migration {
    static function up(): void {
        $sql = "CREATE TABLE IF NOT EXISTS games (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            destiny_id INT NOT NULL,
            score VARCHAR (200),
            CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id),
            CONSTRAINT fk_destiny_id FOREIGN KEY (destiny_id) REFERENCES destinies(id)
        );";

        $GLOBALS['database']->query($sql);
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE games;');
    }
}