<?php
require __DIR__ . '/../model/contacts.php';
require __DIR__ . '/../config/controller.php';
Session::init();
require_once __DIR__ . '/../config/format.php';
require_once __DIR__ . '/../config/session.php';
require_once "../model/profile.php";
class profileController extends controller
{
    function profileController()
    {
        $id = Session::get('user_id');
        $rqm = new profileModel();
        $category = $rqm->getCategory();
        $post = $rqm->getAllPost($id);
        $postImg = $rqm->getPostImg($id);
        $profile = $rqm->getProfile($id);
        // print_r($profile);
        $this->view("profile", ["profile" => $profile, "post" => $post, "category" => $category, "postImg" => $postImg]);
    }
    function setPost()
    {
        $id = Session::get('user_id');
        $categories_name = $_POST['categories'];
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $content = $_POST['content'];
        // require_once "../model/profile.php";
        $rqm = new profileModel();
        $post = $rqm->setPost($title,$intro, $content, $categories_name,$id);
        // header('location:index.php?c=profile&a=profileController');
        header('location: https://www.google.com/');

    }

    function setName()
    {
        $id = Session::get('user_id');
        $ten = $_POST['name'];
        $rqm = new profileModel();
        $rqm->setName($ten, $id);
    }
    function setIntroduce()
    {
        $id = Session::get('user_id');
        $introduce = $_POST['introduce'];
        $rqm = new profileModel();
        $rqm->setIntroduce($introduce, $id);
    }
    function setBackground(){
        $id = Session::get('user_id');
        $background =  basename( $_FILES["backgroundImg"]["name"]);
        $rqm = new profileModel();
        $rqm->setBackground($background, $id);
        $rqm->upBackground();
    }
    function setAvt(){
        $id = Session::get('user_id');
        $avt =  basename( $_FILES["fileToUpload"]["name"]);
        $rqm = new profileModel();
        $rqm->setAvt($avt, $id);
        $rqm->upAvt();
    }
}