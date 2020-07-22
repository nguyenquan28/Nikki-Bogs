<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class post
{
    public $post_id;
    public $categories_id;
    public $title;
    public $intro;
    public $content;
    public $tag;
    public $description;
    public $slug;
    public $active;
    public $time;
    public $status;
    public $user_id;

    function __construct($post_id,$categories_id,$title, $intro, $content,$tag, $description, $slug, $active, $time, $status, $user_id){
        $this->post_id = $post_id;
        $this->categories_id = $categories_id;
        $this->title = $title;
        $this->intro = $intro;
        $this->content = $content;
        $this->tag= $tag;
        $this->description = $description;
        $this->slug = $slug;
        $this->active = $active;
        $this->time = $time;
        $this->status = $status;
        $this->user_id = $user_id;
    }
    
}

class postModel{

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
        $total_pages_sql = "SELECT COUNT(*) FROM posts";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {   

        $query = "SELECT * FROM posts ORDER BY time DESC, active ASC LIMIT $offset, $no_of_records_per_page";
        $data = $this->db->select($query);
        
        $result = [];
        foreach($data->fetch_all() as $value){
            array_push($result, new post($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11]));
        }
        return $result;
    }

    // Insert record in table post
    function insert(post $post)
    {
        $query = "INSERT INTO posts (post_id, categories_id, title, intro, content, tag, description, slug, active, time, status, user_id) 
        VALUE ('$post->post_id', '$post->categories_id', '$post->title', '$post->intro', '$post->content', '$post->tag', '$post->description', 
                '$post->slug', '$post->active', '$post->time', '$post->status', '$post->user_id')";
        $this->db->insert($query);
    }

    // Updata 
    function updata($post)
    {
        $query = "  UPDATE posts SET 
                        post_id = '$post->post_id', 
                        categories_id = '$post->categories_id',  
                        title = '$post->title',  
                        intro = '$post->intro', 
                        content = '$post->content, 
                        tag = '$post->tag', 
                        description = '$post->description', 
                        slug = '$post->slug', 
                        active = '$post->active',
                        time = '$post->time';
                        status = '$post->status';
                        user_id = '$post->user_id';
                    WHERE post_id = '$post->post_id' ";
                        
        $this->db->update($query);
    }

    function changeStt($id, $status){
        $query = "UPDATE posts SET status = $status WHERE post_id = $id";
        $result = $this->db->select($query);
    }

    // get delete record in table post
    function delete($post_id)
    {
        $query = "DELETE FROM posts WHERE post_id = '$post_id'";
        $result = $this->db->delete($query);
    }

    // Search by ID
    function searchByID($post_id)
    {
        $query = "SELECT * FROM posts WHERE post_id = '$post_id'";
        $result = $this->db->select($query);
        return $result;
    }

    // Seaerch by Name
    function searchByTitle($title){
        $query = "SELECT * FROM posts WHERE title = '$title' ";
        $result = $this->db->select($query);

        return $result;
    }

    function PostsTop($sl){
        $query = "SELECT * from posts where status = 1 LIMIT $sl";
        $result = $this->db->select($query);
        $data = [];
        foreach ($result->fetch_all() as $value){
            array_push($data, new post($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11]));
        }

        return $data;

    }

    function PostsSumPage(){
        $page=1;
        $limit=6;
        $qrid= "select post_id from posts";
        $arrs_list = $this->db->select($qrid);
        $total_record = $arrs_list->num_rows;
        $total_page=ceil($total_record/$limit);
        return $total_page;
    }
    function GetAllPostsPage(){
        $limit=6;
        $page=1;
        $a = new postModel();
        $total_page = $a->PostsSumPage();

        //xem trang có vượt giới hạn không:
        if(isset($_GET["page"]))
            $page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
        if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
        if($page>$total_page) $page=$total_page;
        $start=($page-1)*$limit;
        $qrall = "select * from posts limit $start,$limit";
        $result = $this->db->select($qrall);
        $datagetall = [];
        foreach ($result->fetch_all() as $value){
            array_push($datagetall, new post($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11]));
        }
        return $datagetall;
//        print_r($datagetall);
    }
}
