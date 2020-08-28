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

    function delReport(){
        $id = $_GET['id'];

        $report = new reportModel();
        $report->delete($id);

        header('location: index.php?c=report');
    }

    function search()
    {
        $report = new reportModel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $report->search($search);

            if(empty($data)){
                Session::set('erRPSearch', 'Input not Exist');
                header('location: index.php?c=report');
            }else{
                Session::unset('erRPSearch');
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                require_once __DIR__ . '../../views/admin/report.php';
            }
        } else {
            Session::set('erRPSearch', 'Please enter Keyword');
            header('location: index.php?c=report');
        }
    }

}
