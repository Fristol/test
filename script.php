<?php

namespace Main;
require_once 'Database\Redis.php';
require_once 'Interfaces\Template.php';
use Database\Redis\Database;
class Main
{
    protected $db;
    protected $command;
    protected $key;
    protected $value;

    public function __construct($array)
    {
        $this->db = $array[1];
        $this->command = $array[2];
        $this->key = $array[3];
        if (!empty($array[4])) $this->value = $array[4];
    }

    public function start()
    {
        if ($this->db == 'redis') {
            if ($this->command == 'add') Database::add($this->key, $this->value);
            if ($this->command == 'delete') Database::delete($this->key);
        }
        if ($this->db == 'memcached') {
            if ($this->command == 'add') Database::add($this->key, $this->value);
            if ($this->command == 'delete') Database::delete($this->key);
        }
    }
}

$obj = new Main($argv);
$obj->start();
