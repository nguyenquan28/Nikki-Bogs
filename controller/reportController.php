<?php

require_once __DIR__ . '/../model/posts.php';

require __DIR__ . '/../model/report.php';

class reportController
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

        $report = new reportModel();
        $data = $report->getAll($offset, $no_of_records_per_page);
        $total_pages = $report->paginasion($no_of_records_per_page);
        
        $new = $report->countStt()->fetch_assoc();
        Session::set('reportNew', $new['COUNT(*)']);

        require_once __DIR__ . '../../views/admin/report.php';
    }

    function detailReport()
    {
        $id = $_GET['id'];

        $report = new reportModel();
        
        $status =  ($_GET['status']) ? 0 : 0;
        $report->changeStt($id, $status);

        $post = new postModel();
        $data = $post->searchByID($id);
        $result = $data->fetch_assoc();



        require_once __DIR__ . '../../views/admin/detailPost.php';
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

}
