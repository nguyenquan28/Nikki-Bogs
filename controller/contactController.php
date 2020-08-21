<?php
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/contacts.php';

class contactController
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

        $contact = new contactMoldel();
        $data = $contact->getAll($offset, $no_of_records_per_page);
        $total_pages = $contact->paginasion($no_of_records_per_page);

        $new = $contact->countStt()->fetch_assoc();
        Session::set('conNew', $new['COUNT(*)']);

        require_once __DIR__ . '../../views/admin/contact.php';
    }

    function sendMail(){
        $id = $_GET['id'];

        if ($_GET['status']) {
            $status = 0;
        }else{
            $status = 0;
        }

        $contact = new contactMoldel();
        $contact->changeStt($id, $status);
        $data = $contact->searchByID($id);
        $result = $data->fetch_assoc();
        require_once __DIR__ . '../../views/admin/mail.php';
    }

    function search(){
        $contact = new contactMoldel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $contact->search($search);

            require_once __DIR__ . '../../views/admin/contact.php'; 
        } else {
            header('location: index.php?c=contact');
        }
    }
    // function create contact to Admin
    function insert(){
        
    }
}