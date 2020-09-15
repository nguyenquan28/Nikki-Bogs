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
    public $time;
    public $status;

    function __construct($chat_id, $receiver_id, $sender_id, $message, $time, $status)
    {
        $this->chat_id = $chat_id;
        $this->receiver_id = $receiver_id;
        $this->sender_id = $sender_id;
        $this->message = $message;
        $this->time = $time;
        $this->status = $status;
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

        $query = "SELECT * FROM chat ORDER BY time DESC, status DESC LIMIT $offset, $no_of_records_per_page";
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
    function getOne($receiver_id, $sender_id){
        $query = "SELECT * FROM chat WHERE ( receiver_id = $receiver_id AND sender_id = $sender_id ) or (receiver_id = $sender_id AND sender_id = $receiver_id) ORDER BY time DESC LIMIT 1";
        $data = $this->db->select($query)->fetch_assoc();
        return $data;
    }

    // Search by ID
    function searchById($receiver_id, $sender_id){
        $query = "SELECT * FROM chat WHERE ( receiver_id = $receiver_id AND sender_id = $sender_id ) or (receiver_id = $sender_id AND sender_id = $receiver_id)";
        $data = $this->db->select($query);
        $result = [];
        if(!empty($data)){$result = $data->fetch_all(1);}
        return $result;
    }

    //Insert chat 
    function insert(chat $chat){
        $query = "INSERT INTO chat (chat_id, receiver_id, sender_id, message, time, status) 
                VALUE ('$chat->chat_id', '$chat->receiver_id', '$chat->sender_id', '$chat->message', '$chat->time', '$chat->status')";
        $result = $this->db->insert($query);
    } 

    // change status
    function change($sender_id, $receiver_id, $status){
        $query = "UPDATE chat SET status = $status WHERE sender_id = $sender_id AND receiver_id = $receiver_id";
        $result = $this->db->update($query);
    }

    // Search mess
    function searchMess($tags){
        $query = "SELECT * FROM chat, user 
                    WHERE user.name REGEXP '" . $tags . "'
                    GROUP BY chat.chat_id
                ";
        $data = $this->db->select($query);
    }

    // count status
    function countSTT(){
        $query = "SELECT COUNT(*) FROM chat WHERE status = 1 AND receiver_id = 1";
        $result = $this->db->select($query);

        return $result;
    }
}
