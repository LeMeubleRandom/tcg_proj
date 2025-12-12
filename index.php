<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config/autoloader.php";

$router = new Router();
$router->handlerequest($_GET);

?>