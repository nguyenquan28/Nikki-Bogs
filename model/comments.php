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

        $query = "SELECT * FROM comments ORDER BY time DESC, status DESC LIMIT $offset, $no_of_records_per_page";
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

    function saveComment(comment $comment){
        $query = "INSERT INTO comments values ('$comment->comment_id','$comment->user_id','$comment->post_id','$comment->content',$comment->status,$comment->active,'$comment->time')";
        $result = $this->db->insert($query);
        return $result;
//        print_r($query);
    }
    //dem xem bai post co bao nhieu binh luan hien ra
    function countCommentByIdPost($idpost){

        $query = "SELECT COUNT(comment_id) FROM comments WHERE post_id = $idpost and active = 1";


        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        return $result;
    }
    function searchByIdPost($idpost){
        $query = "SELECT * FROM comments WHERE post_id = $idpost and active = 1";
        $resule = $this->db->select($query);
        return $resule;
    }

    //tra ve 1 object chuyen object sang  array co key = value
    function pushDataComment($result){
        $data=[];
        foreach ($result->fetch_all() as $value) {
            array_push($data, new comment($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6]));
        }
        return $data;
    }

    //  Change status
     function changeStt($comment_id, $status){
        $query = "UPDATE comments SET status = $status WHERE comment_id = $comment_id";
        $result = $this->db->select($query);
    }

    // Count status
    function countStt(){
        $query = "SELECT COUNT(*) FROM comments WHERE status = '1'";
        $result = $this->db->select($query);
    }
}