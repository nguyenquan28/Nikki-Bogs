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
        $profile = $rqm->getProfile($id);
        $this->view("profile", ["profile" => $profile, "post" => $post, "category" => $category]);
    }
    function setPost()
    {
        $id = Session::get('user_id');
        $categories_name = $_POST['categories'];
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $content = $_POST['content'];
        $post_img = basename( $_FILES["post_img"]["name"]);
        $rqm = new profileModel();
        $post = $rqm->setPost($title,$intro, $content, $categories_name,$id,$post_img);
        $rqm->upImg("post-img","post_img");
    }
    function editPost(){
        $id_post =  $_POST['post_id'];
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $content = $_POST['content'];
        $rqm = new profileModel();
        $rqm->editPost($title,$intro, $content,$id_post);
        $rqm->redirect();
    }
    function removePost(){
        $id_post =  $_GET['post_id'];
        $rqm = new profileModel();
        $rqm->removePost($id_post);
        $rqm->redirect();
    }
    function setName()
    {
        $id = Session::get('user_id');
        $ten = $_POST['name'];
        $rqm = new profileModel();
        $rqm->setName($ten, $id);
        // $rqm->redirect();
    }
    function setIntroduce()
    {
        $id = Session::get('user_id');
        $introduce = $_POST['introduce'];
        $rqm = new profileModel();
        $rqm->setIntroduce($introduce, $id);
        // $rqm->redirect();

    }
    function setBackground(){
        $id = Session::get('user_id');
        $background =  basename( $_FILES["backgroundImg"]["name"]);
        $rqm = new profileModel();
        $rqm->setBackground($background, $id);
        $rqm->upImg("background-user","backgroundImg");
        $rqm->redirect();

    }
    function setAvt(){
        $id = Session::get('user_id');
        $avt =  basename( $_FILES["fileToUpload"]["name"]);
        $rqm = new profileModel();
        $rqm->setAvt($avt, $id);
        if ($avt == null || $avt == "") {
           echo  ("không có ảnh nào được tải lên avt sẽ trở lại mặc định");

        } else {
            $rqm->upImg("avt-user","fileToUpload");
            $rqm->redirect();
        }
    
    }
}
