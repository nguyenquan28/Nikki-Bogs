<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class user
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $gender;
    public $birthday;
    public $status;
    public $permission;

    function __construct($name, $email, $password, $gender, $birthday, $status, $permission)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->status = $status;
        $this->permission = $permission;
    }
}

class userModel
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
        $total_pages_sql = "SELECT COUNT(*) FROM user";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table post
    function getAll($offset, $no_of_records_per_page)
    {

        $query = "SELECT * FROM user ORDER BY status ASC LIMIT $offset, $no_of_records_per_page";
        $result = $this->db->select($query);

        return $result;
    }


    // Get name user by id
    function getName($user_id)
    {
        $query = "SELECT name FROM user WHERE user_id = '$user_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new user($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

    // get delete record in table post
    function delete($user_id)
    {
        $query = "DELETE FROM user WHERE user_id = '$user_id'";
        $result = $this->db->delete($query);
    }

    // Search by ID
    function searchByID($user_id)
    {
        $query = "SELECT * FROM user WHERE user_id = '$user_id'";
        $result = $this->db->select($query);
        return $result;
    }

    // Seaerch by Name
    function searchByEmai($email)
    {
        $query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    function changeStt($id, $status)
    {
        $query = "UPDATE user SET status = $status WHERE user_id = $id";
        $result = $this->db->select($query);
    }

    function insert(user $user){
        $query = "INSERT INTO user(name, email, password, gender, birthday, status, permission) 
        VALUE ('$user->name', '$user->email', '$user->password', $user->gender, '$user->birthday', $user->status, $user->permission) ";
        $result = $this->db->insert($query);
    }
}
