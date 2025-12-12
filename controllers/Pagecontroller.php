<?php

class PageController {
    public function home() : void {
        $route = "home";
        require "templates/layout.phtml";
    }
}
?>