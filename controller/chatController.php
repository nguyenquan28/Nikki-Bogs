<?php
require_once __DIR__ . '../../model/chat.php';
require_once __DIR__ . '../../model/user.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
class chatController
{
    function getAll()
    {
        $chat = new chatModel();
        $total = $chat->countSTT()->fetch_assoc();
        Session::set('messNew', $total['COUNT(*)']);

        $chat = new chatModel();
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $allData = $chat->getAll($offset, $no_of_records_per_page)->fetch_all(1);
        $total_pages = $chat->paginasion($no_of_records_per_page);


        // echo '<pre>';
        // print_r($allData);
        // echo '</pre>';
        $receivers = [];
        foreach ($allData as $value) {
            if ($value['sender_id'] == Session::get('user_id') || $value['receiver_id'] == Session::get('user_id')) {
                array_push($receivers, $value['receiver_id']);
            }
        }
        $result = [];
        $list_receiver_id = array_unique($receivers, 0);
        $key = array_search(Session::get('user_id'), $list_receiver_id);
        unset($list_receiver_id[$key]);
        // echo '<pre>';
        // print_r($list_receiver_id);
        // echo '</pre>';
        foreach ($list_receiver_id as $value) {
            $record = $chat->getOne($value, Session::get('user_id'));
            array_push($result, $record);
        }
        function date_compare($a, $b)
        {
            $t1 = strtotime($a['time']);
            $t2 = strtotime($b['time']);
            return $t2 - $t1;
        }
        usort($result, 'date_compare');
        $receover = ($result[0]['receiver_id'] == Session::get('user_id')) ? $result[0]['sender_id'] : $result[0]['receiver_id'];
        $detail_chat = $chat->searchById($receover, Session::get('user_id'));
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        require_once __DIR__ . '../../views/admin/chat.php';
    }

    // detail chat room
    function detailChat()
    {
        $chat = new chatModel();
        $total = $chat->countSTT()->fetch_assoc();
        Session::set('messNew', $total['COUNT(*)']);
        
        $receiver_id = $_GET['receiver_id'];
        $sender_id = $_GET['sender_id'];

        $chat = new chatModel();
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $allData = $chat->getAll($offset, $no_of_records_per_page)->fetch_all(1);
        $total_pages = $chat->paginasion($no_of_records_per_page);

        // print_r($allData);
        $receivers = [];
        foreach ($allData as $value) {
            if ($value['sender_id'] == Session::get('user_id') || $value['receiver_id'] == Session::get('user_id')) {
                array_push($receivers, $value['receiver_id']);
            }
        }
        $result = [];
        $list_receiver_id = array_unique($receivers, 0);
        $key = array_search(Session::get('user_id'), $list_receiver_id);
        unset($list_receiver_id[$key]);
        // echo '<pre>';
        // print_r($list_receiver_id);
        // echo '</pre>';
        foreach ($list_receiver_id as $value) {
            $record = $chat->getOne($value, Session::get('user_id'));
            array_push($result, $record);
        }
        // function date_compare($a, $b)
        // {
        //     $t1 = strtotime($a['time']);
        //     $t2 = strtotime($b['time']);
        //     return $t2 - $t1;
        // }
        // usort($result, 'date_compare');
        // print_r($result);    
        $sender = ($receiver_id == Session::get('user_id')) ? $sender_id : $receiver_id;
        $status = 0;
        $chat->change($sender, 1, $status);
        $detail_chat = $chat->searchById($receiver_id, $sender_id);
        require_once __DIR__ . '../../views/admin/chat.php';
    }

    // Send message
    function sendMess()
    {
        $chat = new chatModel();
        $chat_id = '';
        $receiver_id = $_GET['receiver_id'];
        $sender_id = Session::get('user_id');
        if (!empty($_POST['message'])) {
            $mess = $_POST['message'];
            $status = 1;
            $time = date('Y-m-d H:i:s', time());
            // print_r($time);
            $chatContent = new chat($chat_id, $receiver_id, $sender_id, $mess, $time, $status);
            // print_r($chatContent);
            $chat->insert($chatContent);
        }
        header('location: index.php?c=chat&a=detailChat&receiver_id=' . $receiver_id . '&sender_id=' . $sender_id);
    }

    function myChat()
    {
        $chat = new chatModel();
        $sender_id = $_GET['sender_id'];
        $detail_chat = $chat->searchById(1, $sender_id);
        $chat->change(1, Session::get('user_id'), 0);
        require_once __DIR__ . '../../views/home.php';
    }

    // send admin
    function sendAd()
    {
        $chat = new chatModel();
        $chat_id = '';
        $receiver_id = 1;
        $sender_id = Session::get('user_id');
        if (!empty($_POST['message'])) {
            $mess = $_POST['message'];
            $status = 1;
            $time = date('Y-m-d H:i:s', time());
            // print_r($time);
            $chatContent = new chat($chat_id, $receiver_id, $sender_id, $mess, $time, $status);
            // print_r($chatContent);
            $chat->insert($chatContent);
        }
        require_once __DIR__ . '../../views/home.php';
    }

    // Search mess
    function searchMess(){
        $tags = $_POST['input'];
        $chat = new chatModel();
        $data = $chat->searchMess($tags);
        print_r($data);
    }

}
