<?php

require "controllers/Homecontroller.php";
require "controllers/Rushcontroller.php";
require "controllers/TCGcontroller.php";
require "controllers/Usercontroller.php";
require "controllers/Vanguardcontroller.php";
require "config/router.php";

$route = [];

$handle = fopen("config/routes.txt", "r");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $route = [];
        $routeData = explode(" ", str_replace(PHP_EOL, '', $line));
        $route["path"] = $routeData[0];

        if (substr_count($route["path"], "/") > 1) {
            $route["parameter"] = true;
            $pathData = explode("/", $route["path"]);
            $route["path"] = "/".$pathData[1];
        } else {
            $route["parameter"] = false;
        }
        $controllerString = $routeData[1];
        $controllerData = explode(":", $controllerString);
        $route["controller"] = $controllerData[0];
        $route["method"] = $controllerData[1];
        $routes[] = $route;
    }
    fclose($handle);
}

?>