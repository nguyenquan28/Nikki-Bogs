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
    public $description;
    public $slug;
    public $active;

    function __construct($category_id, $name, $tag, $description, $slug, $active)
    {
        $this->category_id = $category_id;
        $this->name = $name;
        $this->tag = $tag;
        $this->description = $description;
        $this->slug = $slug;
        $this->active = $active;
    }
}

class categoryModel
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
        $total_pages_sql = "SELECT COUNT(*) FROM categories";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {

        $query = "SELECT * FROM categories ORDER BY active DESC LIMIT $offset, $no_of_records_per_page";
        $result = $this->db->select($query);

        return $result;
    }


    // Get name category by id
    function getName($category_id)
    {
        $query = "SELECT name FROM categories WHERE categories_id = '$category_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new category($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

    // get delete record in table post
    function delete($category_id)
    {
        $query = "DELETE FROM categories WHERE categories_id = '$category_id'";
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
    function searchByName($name)
    {
        $query = "SELECT * FROM categories WHERE name = '$name' ";
        $result = $this->db->select($query);

        return $result;
    }

    //  Search all
    function search($tags)
    {
        $query = "SELECT * FROM categories 
                WHERE categories_id REGEXP '" . $tags . "'
                OR name REGEXP '" . $tags . "' 
                OR tag REGEXP '" . $tags . "' 
                OR description REGEXP '" . $tags . "' 
                OR slug REGEXP '" . $tags . "' 
                OR active REGEXP '" . $tags . "'
            ";
        $data = $this->db->select($query);
        return $data;
    }

    // Change status
    function changeStt($id, $status)
    {
        $query = "UPDATE categories SET active = $status WHERE categories_id = $id";
        $result = $this->db->select($query);
    }
    // $category_id,$name, $tag, $description, $slug, $active
    function insert(category $cat)
    {
        $query = "INSERT INTO categories (categories_id, name, tag, description, slug, active)
         VALUE ('$cat->category_id', '$cat->name', '$cat->tag', '$cat->description', '$cat->slug', $cat->active)";
        $result = $this->db->insert($query);
    }
    function getFullData()
    {
        $query = "select * from categories";
        $result = $this->db->select($query);
        $data = [];
        foreach ($result->fetch_all() as $value) {
            array_push($data, new category($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]));
        }
        //        print_r($data);
        return $data;
    }
}
