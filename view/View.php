<?php

class View {
    public $path;
    public $task;
    public $layout = "default";
    public function __construct($task) {
        // echo "View <br>";
        $this->task = $task;
        $this->path = $task["controller"]."/".$task['action'];
        // echo $this->path."<br>";
    }

    public function render($title, $url_id) {
        if (file_exists(ROOT."/view/".$this->path.".php")) {
            include_once ROOT."/view/layouts/".$this->layout.".php";
        }
        else {
            echo "Not found".$this->path;
        }
    }

    public function redirect($url) {
        header("Location: ".$url);
        die();
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = "view/errors/".$code.".php";
        if (file_exists($path)) {
            include_once $path;
        }
        die();
    }
}