<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "config/autoloader.php";

try {
    $router = new Router();

    if (isset($_GET["path"])) {
        $request = "/".$_GET["path"];
    } else {
        $request = "/";
    }

    $router->route($routes, $request);

} catch(Exception $e) {
    if($e->getCode() === 404) {
        require "./templates/notFound.phtml";
    }
}

?>