<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';
class images
{
    public $image_id;
    public $url;
    public $post_id;

    function __construct($image_id,$url,$post_id)
    {
        $this->image_id = $image_id;
        $this->url=$url;
        $this->post_id=$post_id;
    }
}
class imagesModel{
    private $db;
    private $fm;

    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    function pushDataImg($result){
        $data=[];
        foreach ($result->fetch_all() as $value) {
            array_push($data, new images($value[0], $value[1], $value[2]));
        }
        return $data;
    }
//    lay img bang id post
    function getImgByIdPost($post_id){
        $query = "SELECT * FROM images WHERE post_id = $post_id limit 1";
        $data = $this->db->select($query);
        $result =$data->fetch_assoc();
        return $result;
    }
}