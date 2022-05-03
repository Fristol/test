<?php

namespace Main;
require_once 'Interfaces/Template.php';


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
        require_once 'Database/' . $this->db . '.php';
                switch ($this->command) {
                    case 'add':
                        \Database::add($this->key, $this->value);
                        break;
                    case 'delete':
                        \Database::delete($this->key);
                        break;
                }
    }
}

$obj = new Main($argv);
$obj->start();
