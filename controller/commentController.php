<?php

require_once __DIR__ . '/../model/posts.php'; 

require __DIR__ . '/../model/comments.php';

class commentController{
    function getAll()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $comment = new commentMoldel();
        $data = $comment->getAll($offset, $no_of_records_per_page);
        $total_pages = $comment->paginasion($no_of_records_per_page);

        require_once __DIR__ . '../../views/admin/comment.php';
    }

    function editStatus(){
        $id = $_GET['id'];

        if ($_GET['status']) {
            $status = 0;
        } else {
            $status = 1;
        }

        $comment = new commentMoldel();
        $comment->changeStt($id, $status);

        header('location: index.php?c=comment');
    }

    function delCat(){
        $id = $_GET['id'];

        $comment = new commentMoldel();
        $comment->delete($id);

        header('location: index.php?c=comment');
    }

    function detailcomment(){
        $id = $_GET['id'];

        $comment = new commentMoldel();
        $data = $comment->searchByID($id);
        $result = $data->fetch_assoc();
        
        require_once __DIR__ . '../../views/admin/detailcomment.php';
    }

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