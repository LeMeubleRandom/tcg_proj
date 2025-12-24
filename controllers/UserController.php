<?php

class UserController {
    public function login() {
        require "templates/login.phtml";
    }
    public function register() {
        require "templates/register.phtml";
    }
    public function profile() {
        require "templates/profile.phtml";
    }
}