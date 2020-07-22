<?php

require_once '../model/posts.php';
class homeController
{
    function ViewHome(){
        require_once '../views/home.php';
    }
    function a(){
        $a = new PostsModel();
        $a->GetAllPostsPage();
    }
}