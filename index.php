<?php
    // FRONT CONTROLLER

    // COMMON SETTING
    ini_set("display_errors",1);
    error_reporting(E_ALL);
    // SYSTEM FILE UPLOAD
    define("ROOT", dirname(__FILE__)); //Gets directory with the project
    // echo ROOT . "<br>";
    require_once(ROOT."/components/Router.php");
    require_once(ROOT."/components/DB.php"); // INSTALLING CONNECTION WITH DATABASE
    // DATABASE CONNECTION
    // $connection = DB::getConnection();
    // ROUTER RECALL
    $router = new Router();
    $router->run();
?>