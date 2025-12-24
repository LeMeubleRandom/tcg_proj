<?php

class HomeController {
    public function home() : void {
        $route = "home";
        require "templates/layout.phtml";
    }
    public function register() : void {
        $route = "register";
        require "templates/layout.phtml";
    }
    public function login() : void {
        $route = "login";
        require "templates/layout.phtml";
    }
    public function notFound() : void {
        $route = "notFound";
        require "templates/layout.phtml";
    }
    public function profile() : void {
        $route = "profile";
        require "templates/layout.phtml";
    }
}
?>