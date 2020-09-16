<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/format.php';
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/posts.php';
require __DIR__ . '/../model/contacts.php';
require __DIR__ . '/../model/chat.php';
require __DIR__ . '/../model/report.php';
require __DIR__ . '/../model/categories.php';


class postController
{

    function getAll()
    {
        Session::unset('postResults');
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

        $chat = new chatModel();
        $total = $chat->countSTT()->fetch_assoc();
        Session::set('messNew', $total['COUNT(*)']);

        require_once __DIR__ . '../../views/admin/post.php';
    }

    function delPost()
    {
        $id = $_GET['id'];

        $post = new postModel();
        $dataPost = $post->searchByID($id)->fetch_assoc();

        // print_r($data);
        if (Session::get('permission') == 0) {
            $chat = new chatModel();
            $chat_id = '';
            $receiver_id = $_GET['receiver_id'];
            $sender_id = Session::get('user_id');
            $mess = 'Your Post will be delete: ' . $dataPost['title'];
            $status = 1;
            $time = date('Y-m-d H:i:s', time());
            // print_r($time);
            $chatContent = new chat($chat_id, $receiver_id, $sender_id, $mess, $time, $status);
            // print_r($chatContent);
            $chat->insert($chatContent);
        }

        $post->delete($id);

        header('location: index.php');
    }

    function changeActive()
    {
        $id = $_GET['id'];

        $post = new postModel();
        $active =  ($_GET['active']) ? 0 : 1;

        $post->changeActive($id, $active);
        $data = $post->searchByID($id)->fetch_assoc();
        // print_r($data);
        $chat = new chatModel();

        if (Session::get('permission') == 0) {
            $chat_id = '';
            $receiver_id = $_GET['receiver_id'];
            $sender_id = Session::get('user_id');
            $mess = ($active) ? 'Your Post will be accept: ' . $data['title'] : 'Your Post will be block: ' . $data['title'];
            $status = 1;
            $time = date('Y-m-d H:i:s', time());
            // print_r($time);
            $chatContent = new chat($chat_id, $receiver_id, $sender_id, $mess, $time, $status);
            // print_r($chatContent);
            $chat->insert($chatContent);
        }

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
        $imgURL = $post->selectIMG($id);
        if(!empty($imgURL)){
            $imgURL = $imgURL->fetch_assoc();
        }
        // print_r($imgURL['url']);
        require_once __DIR__ . '../../views/admin/detailPost.php';
    }

    function search()
    {
        $post = new postModel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $post->search($search);

            if (empty($data)) {
                Session::unset('postSearchErr');
                Session::set('postResults', 'No results for ' . $_POST["input"]);
                header('location: index.php');
            } else {
                Session::set('postSearchErr', 'Results for ' . $_POST["input"]);
                echo '<pre>';
                print_r($data);
                echo '</pre>';
                // require_once __DIR__ . '../../views/admin/post.php';
            }
        } else {
            Session::set('postSearchErr', 'No results for ' . $_POST["input"]);
            header('location: index.php');
        }
    }

    function newPost()
    {
        $cat = new categoryModel();
        $listCat = $cat->getActive()->fetch_all(1);
        // print_r($listCat['name']);
        require_once __DIR__ . '../../views/admin/newPost.php';
    }

    function savePost()
    {
        // print_r($_POST);
        Session::unset('newPostErr');
        if (!empty($_POST['categories']) && !empty($_POST['title']) && !empty($_POST['intro']) && !empty($_POST['content'])) {
            $id = Session::get('user_id');
            $categories_name = $_POST['categories'];
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
            $post_img = basename($_FILES["post_img"]["name"]);
            $rqm = new postModel();
            $post = $rqm->setPost($title, $intro, $content, $categories_name, $id, $post_img);
            $rqm->upImg("post-img", "post_img");
            print_r('hello');
            header('location: index.php');
        } else {
            $cat = new categoryModel();
            $listCat = $cat->getAll(0, 100)->fetch_all(1);
            Session::set('newPostErr', 'Input not empty!');
            require_once __DIR__ . '../../views/admin/newPost.php';
        }
    }
}
