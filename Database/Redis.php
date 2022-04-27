<?php

namespace Database\Redis;

require_once 'Interfaces\Template.php';
require_once './vendor/autoload.php';

use Predis\Client;
use Template;


class Database implements Template
{
    public static function getAll()
    {
        $redis = new Client();
        $redis->connect('redis', 6379);
        $allKeys = $redis->keys('*');
        $data = [];
        foreach ($allKeys as $key) {
            $data[$key] = $redis->get($key);
        }
        return $data;
    }

    public static function add($key, $value)
    {
        $redis = new Client();
        $redis->connect('redis', 6379);
        $redis->set($key, $value);
        $redis->expire($key, 3600);
        return true;
    }

    public static function delete($key)
    {
        $redis = new Client();
        $redis->connect('redis', 6379);
        $redis->del($key);
        return true;
    }
}