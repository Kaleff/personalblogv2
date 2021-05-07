<?php
include_once ROOT."/models/Model.php";

class Main extends Model {
    public function __construct() {
        parent::__construct();
        $articlesByCat = [];
        foreach ($this->categoriesById as $catId=>$catName) {
            // echo $catId."=>".$catName."<br>";
            $articles = mysqli_query($this->dbConnection,"SELECT * FROM `articles` 
                                                                WHERE `category_id` = $catId
                                                                ORDER BY `id`
                                                                DESC LIMIT 10");
            $articlesByCat[$catId] = $articles;
            while ($article = mysqli_fetch_assoc($articles)) {
                //
            }
        }
    }
}
?>