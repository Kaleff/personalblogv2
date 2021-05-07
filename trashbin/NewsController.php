<?php
// include_once ROOT. "/models/News.php";

class NewsController
{
    public function actionIndex() {
        echo "<br> NewsController actionIndex";
        return true;
        //$newsList = News::getNewsList();
        include_once ROOT."/view/newsView.php";
        echo "EEE";
        $a = new newsView();
        echo $a->viewNewsView();
    }
    public function actionView($category, $id) {
        echo "<br> NewsController actionView, show particular news. ";
        echo "<br> Category: " . $category;
        echo "<br> Number: " . $id;

        $newsItem = News::getNewsItemById($id);
        return true;
    }
}