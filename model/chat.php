<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class chat
{
    public $chat_id;
    public $receiver_id;
    public $sender_id;
    public $message;

    function __construct($chat_id, $receiver_id, $sender_id, $message)
    {
        $this->chat_id = $chat_id;
        $this->receiver_id = $receiver_id;
        $this->sender_id = $sender_id;
        $this->message = $message;
    }
}

class chatModel
{
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // Function paginasion
    function paginasion($no_of_records_per_page)
    {
        $total_pages_sql = "SELECT COUNT(*) FROM chat";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table user
    function getAll($offset, $no_of_records_per_page)
    {

        $query = "SELECT * FROM chat ORDER BY time DESC LIMIT $offset, $no_of_records_per_page";
        $result = $this->db->select($query);

        return $result;
    }

    // Get name user by id
    function getName($chat_id)
    {
        $query = "SELECT name FROM chat WHERE chat_id = '$chat_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new user($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

    // Get one 
    function getOne($receiver_id){
        $query = "SELECT * FROM chat WHERE receiver_id = $receiver_id ORDER BY time DESC LIMIT 1";
        $data = $this->db->select($query)->fetch_assoc();
        return $data;
    }

    // Search by ID
    function searchById($id){
        $query = "SELECT * FROM chat WHERE sender_id = $id or receiver_id = $id";
        $result = $this->db->select($query)->fetch_all(1);
        return $result;
    }
}
