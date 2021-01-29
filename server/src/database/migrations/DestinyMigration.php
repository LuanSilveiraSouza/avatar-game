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

        $GLOBALS['database']->query("INSERT INTO destinies (content, min_score, max_score)
        VALUES ('A strange crature men-eating appears and gobble both of you, that is the end of your journey.', 0, 2)");
        $GLOBALS['database']->query("INSERT INTO destinies (content, min_score, max_score)
        VALUES ('you see nothing for a couple of minutes but them, you hear the noise of something hiding in the trees, you got the strange sensation of being observed, but you continue your path.', 3, 4)");
        $GLOBALS['database']->query("INSERT INTO destinies (content, min_score, max_score)
        VALUES ('A strange creature passes right through you, but thanks for your intelligent move, you are out of danger and can continue your path with serenity.', 5, 6)");
    }

    static function down(): void {
        $GLOBALS['database']->query('DROP TABLE destinies;');
    }
}