<?php
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/contacts.php';

class contactController
{

    function getAll()
    {
        Session::unset('conResults');
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

        $status = ($_GET['status']) ? 0 : 0;

        $contact = new contactMoldel();
        $user = new userModel();
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
            if(empty($data)){
                Session::unset('conResults');
                Session::set('conSearchErr', 'No results for ' . $_POST["input"]);
                header('location: index.php?c=contact');
            }else{
                Session::unset('conSearchErr');
                Session::set('conResults', 'Results for ' . $_POST["input"]);
                require_once __DIR__ . '../../views/admin/contact.php'; 
            }
        } else {
            Session::set('conSearchErr', 'No results for ' . $_POST["input"]);
            header('location: index.php?c=contact');
        }
    }
    // function create contact to Admin
    function insert(){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['title']) && !empty($_POST['message'])){
            Session::unset('ConErr');
            $contacts_id = '';
            $fullname = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone'];
            $title = $_POST['title'];
            $content = $_POST['message'];
            $static = 1;
            $active = 1;
            $con = new contact($contacts_id, $fullname, $email, $phone_number, $title, $content, $static, $active);
            
            $contact = new contactMoldel();
            $contact->insert($con);

            setcookie("alertContact", "Succcss", time()+3);
            header('location: contact.php');
        }else{
            Session::set('ConErr', 'Input not empty!');
            header('location: contact.php');
        }
    }

    // delete contact
    function delCon(){
        $id = $_GET['id'];

        $contact = new contactMoldel();
        $contact->del($id);
        $con = new contactController();
        $con->getAll();
    }

}