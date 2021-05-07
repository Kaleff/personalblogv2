<?php
include_once ROOT."/controllers/Controller.php";
class MainController extends Controller {
    public function indexAction() {
        //echo "Welcome to the main page";
        $this->view->render("Главная страница", 0);
    }
    public function contactAction() {
        $this->view->render("Contact Me", 0);
    }
}