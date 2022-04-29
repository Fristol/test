<?php

namespace ApiController;

require_once './Backend/vendor/autoload.php';
$method = $_SERVER['REQUEST_METHOD'];

// Urls
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);
//Routers
$router = $urls[1];
$urlData = $urls[2];
// Connect routers file
if ($urls[0] === 'api') {
    include_once 'Backend/routers/' . $router . '/route.php';
    route($method, $urlData, $urls);
}
?>
