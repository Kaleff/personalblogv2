<?php


class Router
{
    //$routes = all the route elements
    private $routes;
    public function __construct() {
        $routesPath = ROOT."/config/routes.php";
        $this->routes = include($routesPath);
    }

    // Returns Request String
    private function extractRequestURI() {
        if (!empty ($_SERVER["REQUEST_URI"])) {
            return trim($_SERVER["REQUEST_URI"], "/");
        }
    }
    public function run() {
        // RECEIVE REQUEST LINE
        $uri = $this->extractRequestURI();
        echo "Request: ".$uri."<br>";
        // CHECK FOR THE EXISTENCE OF THE REQUEST IN routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // COMPARE $uriPattern and $uri
            if (preg_match("~$uriPattern~", $uri) ) {
                echo "Yes ";
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // IF THERE IS A MATCH, DEFINE WHICH CONTROLLER AND ACTION WILL PROCESS THE REQUEST
                // Dismember by segments
                $segments = explode("/",$internalRoute);
                $controllerName = array_shift($segments)."Controller"; // TAKE OUT 1st ELEMENT OF SEGMENTS, using name of controller, leaving action name for later
                $controllerName = ucfirst($controllerName);

                $actionName = "action".ucfirst(array_shift($segments)); // TAKE OUT THE REMAINING ELEMENT OF SEGMENTS: ACTION NAME
                echo "<br>Class: ".$controllerName;
                echo "<br>Method: ".$actionName;
                // RECALL THE FILE OF CLASS-CONTROLLER
                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php"; //GET THE DIRECTORY OF CONTROLLER
                echo "<br>Controller Name:" . $controllerFile;

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                // CREATE OBJECT, CALL THE METHOD
                $controllerObject = new $controllerName; // $controllerName is a name of the class we figured out
                $result = call_user_func_array(array($controllerObject, $actionName), $segments);
                $result = $controllerObject->$actionName();
                echo "<br>";
                echo ($result) ? "True" : "False";
                if ($result != null) {
                    break;
                }
            }

        }



    }
}