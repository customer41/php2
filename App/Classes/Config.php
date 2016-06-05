<?php

namespace App\Classes;

class Config
{
    private static $instance;
    public $data;

    private function __construct() {
        $this->data = require __DIR__ . '/../../config.php';
    }

    public static function getInstance() {
        if (null == self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }
}