<?php
class Bootstrap {
    private $controller;
    private $action;
    private $request;

    public function __construct($request) {
        // Handle request
        $this->request = $request;
        if ($this->request['controller'] == '') {
            // Load home page
            $this->controller = 'home';
        } else {
            // Load requested controller
            $this->controller = $this->request['controller'];
        }

        // Handle action
        if ($this->request['action'] == '') {
            // Index action
            $this->action = 'index';
        } else {
            // Action
            $this->action = $this->request['action'];
        }
        
    }
}