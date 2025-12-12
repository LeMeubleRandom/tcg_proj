<?php

class Router {
    public function __construct() {

    }
    public function handlerequest(array $get) : void {
        if (isset($get["route"])) {
            if ($get["route"] === "accueil") {
                $control = new PageController;
                $control->home();
            } else {
                $control = new PageController;
                $control = home();
            }
        } else {
            $control = new PageController;
            $control->home();
        }
    }
}
?>