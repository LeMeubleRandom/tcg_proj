<?php

class Router {

    public function __construct() {

    }  

    public function handlerequest(array $get) : void {
        $control = new HomeController;
        if (isset($get["route"])) {
            if (method_exists($control, $get["route"]) && is_callable([$control, $get["route"]]) && substr($get["route"], 0, 2) !== '__') {
                $control->{$get["route"]}();
            } else {
                $control->notFound();
            }
        } else {
            $control->home();
        }
    }
}

?>