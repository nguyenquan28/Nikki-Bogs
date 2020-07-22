<?php
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/posts.php';

class postController
{

    function getAll()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $post = new postModel();
        $data = $post->getAll($offset, $no_of_records_per_page);
        $total_pages = $post->paginasion($no_of_records_per_page);

        require_once __DIR__ . '../../views/admin/post.php';
    }

    function editStatus(){
        $id = $_GET['id'];

        if ($_GET['status']) {
            $status = 0;
        } else {
            $status = 1;
        }

        $post = new postModel();
        $post->changeStt($id, $status);

        header('location: index.php');
    }

    function delPost(){
        $id = $_GET['id'];

        $post = new postModel();
        $post->delete($id);

        header('location: index.php');
    }

    function detailPost(){
        $id = $_GET['id'];

        $post = new postModel();
        $data = $post->searchByID($id);
        $result = $data->fetch_assoc();
        
        require_once __DIR__ . '../../views/admin/detailPost.php';
    }
}
