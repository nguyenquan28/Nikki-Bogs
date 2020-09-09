<?php

require_once '../model/posts.php';
class homeController
{
    function ViewHome(){
        require_once '../views/home.php';
    }

//    function a(){
//        $a = new postModel();
//        print_r($a->getAllByIdCateAndPage());
//
//    }
    function viewArchive(){
        require_once '../views/archive-blog.php';
    }
    function viewSinglePost(){
        require_once '../views/single-post.php';
    }


}