<?php
use Redis\Metods\Metods;
require_once 'Redis.php';
function route($method, $urls)
{
    switch ($method) {
        case 'GET':
            Metods::getAll($urls);
            break;
        case 'DELETE':
            Metods::delete($urls[2], $urls);
            break;
    }
}
