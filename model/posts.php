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

    function __construct($post_id, $categories_id, $title, $intro, $content, $tag, $description, $slug, $active, $time, $status, $user_id)
    {
        $this->post_id = $post_id;
        $this->categories_id = $categories_id;
        $this->title = $title;
        $this->intro = $intro;
        $this->content = $content;
        $this->tag = $tag;
        $this->description = $description;
        $this->slug = $slug;
        $this->active = $active;
        $this->time = $time;
        $this->status = $status;
        $this->user_id = $user_id;
    }
}

class postModel
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
        $total_pages_sql = "SELECT COUNT(*) FROM posts";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {

        $query = "SELECT * FROM posts ORDER BY time DESC, status DESC LIMIT $offset, $no_of_records_per_page";
        $data = $this->db->select($query);

        $result = [];
        foreach ($data->fetch_all() as $value) {
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

    function changeStt($id, $status)
    {
        $query = "UPDATE posts SET status = $status WHERE post_id = $id";
        $result = $this->db->update($query);
    }

    function changeActive($id, $active)
    {
        $query = "UPDATE posts SET active = $active WHERE post_id = $id";
        $result = $this->db->update($query);
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
        $query = "SELECT * FROM posts WHERE post_id = '$post_id'and active = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    // Seaerch by Name
    function searchByTitle($title)
    {
        $query = "SELECT * FROM posts WHERE title = '$title' and active = '1' ";
        $result = $this->db->select($query);

        return $result;
    }

    function PostsTop($sl){
        $query = "SELECT * from posts where active = 1 LIMIT $sl";
        $result = $this->db->select($query);
        return $result;

    }

    //get top 2 post where
    //get all by Id category
    function getAllByIdCateAndPage(){
        $limit=6;
        $page=1;
        $id_cate = '';
        $postModel = new postModel();
        $total_page = $postModel->PostsSumPage();

        if(isset($_GET["page"])){
            $page=$_GET["page"];
        }
        if (isset($_GET['idcate'])){
            $id_cate =$_GET['idcate'];
        }else{
            return $data = $postModel->GetAllPostsPage();
        }

        if($page<1) $page=1;
        if($page>$total_page) $page=$total_page;
        $start=($page-1)*$limit;
        $query = "SELECT * FROM posts WHERE `active` = 1 and categories_id = $id_cate LIMIT $start, $limit";
        $result = $this->db->select($query);
        return $result;
    }

    //get all page
    function PostsSumPage(){
        $page=1;
        $limit=6;
        $qrid= "select post_id from posts where active = '1'";
        $arrs_list = $this->db->select($qrid);
        $total_record = $arrs_list->num_rows;
        $total_page=ceil($total_record/$limit);
        return $total_page;
    }
    //lay ra tat ca du lieu va phan trang
    function GetAllPostsPage(){
        $limit=6;
        $page=1;
        $postModel = new postModel();
        $total_page = $postModel->PostsSumPage();

        //xem trang có vượt giới hạn không:
        if(isset($_GET["page"]))
            $page=$_GET["page"];
        if($page<1) $page=1;
        if($page>$total_page) $page=$total_page;
        $start=($page-1)*$limit;
        $qrall = "select * from posts limit $start,$limit";
        $result = $this->db->select($qrall);
        return $result;
//        print_r($datagetall);
    }
    //RELATED POSTS by id category
    function RelatedByIdCateTop2($id_cate){
        $query = "select * from posts where active = 1 and categories_id = $id_cate limit 2";
        $result = $this->db->select($query);
        return $result;
    }


//tra ve 1 object chuyen object sang  array co key = value
    function pushDataPost($result){
        $data=[];
        foreach ($result->fetch_all() as $value) {
            array_push($data, new post($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11]));
        }
        return $data;
    }
    //dem co bao nhieu bai theo tag
    function countPostByIdCate($idCate){
        $query = "SELECT COUNT(post_id) FROM posts WHERE categories_id= $idCate";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        return $result;
    }
    //tim kiem search
    function searchLikeTitle(){
        $limit=6;
        $page=1;
        $postModel = new postModel();
        $total_page = $postModel->PostsSumPage();

        if(isset($_GET["page"])){
            $page=$_GET["page"];
        }
        if (isset($_POST['search'])){
            $title = $_POST['search'];
            $search = str_replace(' ','%',$title);
        }else{
            return $data = $postModel->GetAllPostsPage();
        }

        if($page<1) $page=1;
        if($page>$total_page) $page=$total_page;
        $start=($page-1)*$limit;

        $query = "SELECT p.* from  posts as p , user as u,categories as c WHERE p.active = 1 and p.user_id = u.user_id and p.categories_id = c.categories_id and (p.title like '%$search%'or c.`name` like '%$search%'or u.`name` like '%$search%') limit $start,$limit";
        $result = $this->db->select($query);
        return $result;
    }
    //  Search all
    function search($tags)
    {
        
        $result = [];
        $query = "SELECT * FROM posts, user 
                    WHERE posts.post_id REGEXP '" . $tags . "' 
                    OR user.name REGEXP '" . $tags . "'
                    OR posts.intro REGEXP '" . $tags . "' 
                    OR posts.title REGEXP '" . $tags . "' 
                    OR posts.content REGEXP '" . $tags . "' 
                    OR posts.tag REGEXP '" . $tags . "'
                    OR posts.time REGEXP '" . $tags . "'
                    GROUP BY posts.post_id
                ";
        $data = $this->db->select($query);
        // echo '<pre>';
        // print_r($data->fetch_all());
        // echo '</pre>';
        if (empty($data)) {
            return '';
        } else {
            foreach ($data->fetch_all() as $value) {
                array_push($result, new post($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11]));
            }
            return $result;
        }
    }

    // Get name user by id
    function getName($post_id)
    {
        $query = "SELECT title FROM posts WHERE post_id = '$post_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new user($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

    // Count status
    function countStt()
    {
        $query = "SELECT COUNT(*) FROM posts WHERE active = '1'";
        $result = $this->db->select($query);

        return $result;
    }
}
