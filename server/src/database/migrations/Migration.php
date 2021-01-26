<?php

namespace App\Database;

interface Migration {
    public function up() : void;
    public function down() : void;
}
