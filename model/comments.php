<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class comment{
    public $comment_id;
    public $user_id;
    public $post_id;
    public $content;
    public $status;
    public $active;
    public $time;

    function __construct($comment_id, $user_id, $post_id, $content, $status, $active, $time)
    {   
        $this->comment_id = $comment_id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->content = $content;
        $this->status = $status;
        $this->active = $active;
        $this->time = $time;
    }
}

class commentMoldel{
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
        $total_pages_sql = "SELECT COUNT(*) FROM comments";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {   

        $query = "SELECT * FROM comments ORDER BY time DESC, active ASC LIMIT $offset, $no_of_records_per_page";
        $result = $this->db->select($query);
        
        return $result;
    }


    // Get name comment by id
    function getName($comment_id){
        $query = "SELECT name FROM comments WHERE comment_id = '$comment_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new comments($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

     // get delete record in table post
     function delete($comment_id)
     {
         $query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
         $result = $this->db->delete($query);
     }
 
     // Search by ID
     function searchByID($comment_id)
     {
         $query = "SELECT * FROM comments WHERE comment_id = '$comment_id'";
         $result = $this->db->select($query);
         return $result;
     }
 
     // Seaerch by Name
     function searchByName($name){
         $query = "SELECT * FROM comments WHERE name = '$name' ";
         $result = $this->db->select($query);
 
         return $result;
     }
}