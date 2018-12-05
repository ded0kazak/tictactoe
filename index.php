<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
define("ROOT", __DIR__);

//require_once ROOT . "/Router.php";
require_once ROOT . "/vendor/autoload.php";
$router = new Router();
$router->run();
