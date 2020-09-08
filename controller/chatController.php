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
        $data = $chat->getAll($offset, $no_of_records_per_page)->fetch_all(1);
        $total_pages = $chat->paginasion($no_of_records_per_page);

        // print_r($data);
        require_once __DIR__ . '../../views/admin/chat.php';
    }
}
