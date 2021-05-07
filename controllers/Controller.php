<?php
include_once ROOT."/view/View.php";

abstract class Controller {
    public $task;
    public $view;
    public $data;
    public function __construct($task){
        $this->task=$task;
        $this->view= new View($task);
        $this->data = $this->loadModel($task['controller']);
        //print_r($this->data);
    }
    public function loadModel($modelName) {
        $modelName = ucfirst($modelName);
        $path = ROOT."/models/".$modelName.'.php';
        // echo $path;
        if(file_exists($path)) {
            include $path;
            return new $modelName;
        }
    }
}