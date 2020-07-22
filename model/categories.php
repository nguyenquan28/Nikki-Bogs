<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class category
{
    public $category_id;
    public $name;
    public $tag;
    public $desciption;
    public $slug;
    public $active;

    function __construct($category_id, $name, $tag, $desciption, $slug, $active)
    {
        $this->category_id = $category_id;
        $this->name = $name;
        $this->tag = $tag;
        $this->desciption = $desciption;
        $this->slug = $slug;
        $this->active = $active;
    }
}

class categoryModel{
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
        $total_pages_sql = "SELECT COUNT(*) FROM categories";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {   

        $query = "SELECT * FROM categories ORDER BY time DESC, active ASC LIMIT $offset, $no_of_records_per_page";
        $result = $this->db->select($query);
        
        return $result;
    }


    // Get name category by id
    function getName($category_id){
        $query = "SELECT name FROM categories WHERE categories_id = '$category_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new category($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

     // get delete record in table post
     function delete($category_id)
     {
         $query = "DELETE FROM categories WHERE category_id = '$category_id'";
         $result = $this->db->delete($query);
     }
 
     // Search by ID
     function searchByID($category_id)
     {
         $query = "SELECT * FROM categories WHERE category_id = '$category_id'";
         $result = $this->db->select($query);
         return $result;
     }
 
     // Seaerch by Name
     function searchByName($name){
         $query = "SELECT * FROM categories WHERE name = '$name' ";
         $result = $this->db->select($query);
 
         return $result;
     }
}
