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

        // Create controller
        public function createController() {
            // Check class
            if (class_exists($this->controller)) {
                $parents = class_parents($this->controller);
                // Check extend
                if (in_array("Controller", $parents)) {
                    // Does it contain an action?
                    if (method_exists($this->controller, $this->action)) {
                        return new $this->controller($this->action, $this->request);
                    } else {
                        // Method does not exist
                        echo '<h1>Method does not exist</h1>';
                        return;
                    }
                } else {
                    // Base controller does not exist
                    echo '<h1>Base controller not found</h1>';
                    return;
                }
            } else {
                // Controller class does not exist
                echo '<h1>Controller class does not exist</h1>';
                return;
            }
        }
}