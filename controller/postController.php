<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/posts.php';
require __DIR__ . '/../model/contacts.php';
require __DIR__ . '/../model/chat.php';
require __DIR__ . '/../model/report.php';


class postController
{

    function getAll()
    {
        // Session::unset('erSearch');
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

        $new = $post->countStt()->fetch_assoc();
        Session::set('postNew', $new['COUNT(*)']);

        $user = new userModel();
        $new = $user->countStt()->fetch_assoc();
        Session::set('userNew', $new['COUNT(*)']);

        $contact = new contactMoldel();
        $new = $contact->countStt()->fetch_assoc();
        Session::set('conNew', $new['COUNT(*)']);

        $report = new reportModel();
        $new = $report->countStt()->fetch_assoc();
        Session::set('reNew', $new['COUNT(*)']);


        require_once __DIR__ . '../../views/admin/post.php';
    }

    function delPost()
    {
        $id = $_GET['id'];

        $post = new postModel();
        $post->delete($id);

        header('location: index.php');
    }

    function changeActive()
    {
        $id = $_GET['id'];

        $post = new postModel();
        $active =  ($_GET['active']) ? 0 : 1;

        $post->changeActive($id, $active);

        $chat = new chatModel();

        $chat_id = '';
        $receiver_id = $_GET['receiver_id'];
        $sender_id = Session::get('user_id');
        $mess = ($active) ? 'Your Post will be accept' : 'Your Post will be block';
        $status = 1;
        $time = date('Y-m-d H:i:s', time());
        // print_r($time);
        $chatContent = new chat($chat_id, $receiver_id, $sender_id, $mess, $time, $status);
        // print_r($chatContent);
        $chat->insert($chatContent);

        header('location: index.php');
    }

    function detailPost()
    {
        $id = $_GET['id'];

        $post = new postModel();

        $status =  ($_GET['status']) ? 0 : 0;
        $post->changeStt($id, $status);

        $data = $post->searchByID($id);
        $result = $data->fetch_assoc();

        require_once __DIR__ . '../../views/admin/detailPost.php';
    }

    function search()
    {
        $post = new postModel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $post->search($search);

            if (empty($data)) {
                Session::set('erSearch', 'Input not Exist');
                header('location: index.php');
            } else {
                Session::unset('erSearch');
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                require_once __DIR__ . '../../views/admin/post.php';
            }
        } else {
            Session::set('erSearch', 'Please enter Keyword');
            header('location: index.php');
        }
    }
}
