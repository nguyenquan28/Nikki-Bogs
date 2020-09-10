<?php
require_once __DIR__ . '../../model/chat.php';
require_once __DIR__ . '../../model/user.php';
class chatController
{
    function getAll()
    {

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
            if ($value['sender_id'] == Session::get('user_id')) {
                array_push($receivers, $value['receiver_id']);
            }
        }
        $result = [];
        $list_receiver_id = array_unique($receivers, 0);
        foreach ($list_receiver_id as $value) {
            $record = $chat->getOne($value);
            array_push($result, $record);
        }
        $detail_chat = $chat->searchById($result[0]['receiver_id']);
        // print_r($detail_chat);
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        require_once __DIR__ . '../../views/admin/chat.php';
    }

    // detail chat room
    function detailChat()
    {
        $receiver_id = $_GET['receiver_id'];
        $chat = new chatModel();

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
            if ($value['sender_id'] == Session::get('user_id')) {
                array_push($receivers, $value['receiver_id']);
            }
        }
        $result = [];
        $list_receiver_id = array_unique($receivers, 0);
        foreach ($list_receiver_id as $value) {
            $record = $chat->getOne($value);
            array_push($result, $record);
        }

        $detail_chat = $chat->searchById($receiver_id);
        require_once __DIR__ . '../../views/admin/chat.php';
    }

    // Send message
    function sendMess()
    {
        $receiver_id = $_GET['receiver_id'];
        $sender_id = Session::get('user_id');
        $mess = $_POST['message'];
        $status = 1;
    }
}
