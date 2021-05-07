<?php

Class DB
{
    public static function getConnection()
    {
        $paramsPath = ROOT . "/config/db_parameters.php";
        $params = include($paramsPath);
        $connection = mysqli_connect(
            $params['db']['server'],
            $params['db']['username'],
            $params['db']['password'],
            $params['db']['name']
        );
        $GLOBALS["LI_url"] = $params["LI_url"];
        $GLOBALS["Web_Title"] = $params["title"];
        if (!$connection) {
            echo "Connection to Database unsuccessful <br>";
            echo mysqli_connect_error();
            die();
        }
        return($connection);
    }
}
