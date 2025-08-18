<?php

class Model
{
    // extends PDO
    // public function __construct() {
    //     $config = require '../config.php';
    //     $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset=utf8";
    //     parent::__construct($dsn, $config['db']['user'], $config['db']['pass']);
    // }

    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}
