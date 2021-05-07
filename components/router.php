<?php
include(ROOT."/view/View.php");

class Router {
    protected $routes = [];
    protected $params = [];
    public $ulr_id;

    public function __construct() {
        $routesArray = include_once ROOT."/config/routes.php";
        foreach ($routesArray as $rKey => $rValue) {
            $this->add($rKey, $rValue);
        }
    }
    public function add($route, $params) {
        $route = "#^".$route."$#";
        $this->routes[$route] = $params;
    }
    public function match() {
        $url = trim($_SERVER["REQUEST_URI"], "/");
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $segments = explode("/",$url);
                $lastSeg = $segments[count($segments)-1];
                $lseg = (int) $lastSeg;
                if($lseg == $lastSeg){
                    $this->ulr_id = $lastSeg;
                }
                // echo $this->ulr_id;
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run() {
        // echo "start";
        if($this->match() ){
            $controllerPath = ROOT."/controllers/".ucfirst($this->params["controller"])."Controller.php";
            $controllerName = ucfirst($this->params["controller"])."Controller";
            // echo $controllerPath." ".$this->params["action"]."<br>";
            if (file_exists($controllerPath)) {
                $controllerAction = $this->params['action']."Action";
                include_once $controllerPath;
                if (method_exists($controllerName, $controllerAction)) {
                    $controller = new $controllerName($this->params);
                    if(!empty($this->ulr_id)) {
                        $controller->$controllerAction($this->ulr_id);
                    }
                    else {
                        $controller->$controllerAction();
                    }
                }
                else {
                    View::errorCode(404);
                }
            }
            else {
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }
}