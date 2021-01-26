<?php

namespace App\Database;

interface Migration {
    static function up() : void;
    static function down() : void;
}
