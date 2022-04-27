<?php
use Redis\Metods\Metods;
require_once 'Redis.php';
function route($method, $urlData, $urls)
{
    switch ($method) {
        case 'GET':
            Metods::getAll($urlData, $urls);
            break;
        case 'DELETE':
            Metods::delete($urlData, $urls);
            break;
    }
}