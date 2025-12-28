<?php

class HomeController {
    public function home() : void {
        $route = "home";
        require "templates/layout.phtml";
    }
    public function notFound() : void {
        $route = "notFound";
        require "templates/layout.phtml";
    }
}
?>