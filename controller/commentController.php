<?php

require_once '../model/comments.php';
require_once '../model/posts.php';

class commentController
{
    function addcomment(){
        $PostsModel = new postModel();
        if (isset($_POST['search'])){
            $data = $_POST['search'];
            $search = str_replace(' ','%',$data);
        $data = $PostsModel->searchLikeTitle($search);
        print_r($data['categories_id']);

        }
        header('location: index.php?c=home&a=viewArchive&idcate='.$data['categories_id']);
    }



}