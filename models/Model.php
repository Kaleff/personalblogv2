<?php

abstract class Model {
    public $dbConnection;
    public function __construct()
    {
        $this->dbConnection = DB::getConnection();
        $categoriesById = [];
        $categories = mysqli_query($this->dbConnection, "SELECT * FROM `articles_categories`");
        while($category = mysqli_fetch_assoc($categories) )
        {
            $categoriesById[$category['id']] = $category['title'];
        }
        $this->categoriesById = $categoriesById;
    }

}