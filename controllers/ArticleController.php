<?php
include_once ROOT."/controllers/Controller.php";
class ArticleController extends Controller {
    public function indexAction() {
        $this->view->render("Articles",0);
    }
    public function showAction($id) {
        $this->view->render("Article",$id);
    }
    public function categoryAction($id) {
        echo $id;
        $this->view->render("Articles",$id);
    }
}