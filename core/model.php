<?php

class Model
{
    public $db;
    public function __construct()
    {
        $this->db =
            new PDO("mysql:host=".DB_HOST .";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);

    }
}
