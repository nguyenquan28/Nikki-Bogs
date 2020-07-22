<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class contact{
    public $contacts_id;
    public $fullname;
    public $email;
    public $phone_number;
    public $title;
    public $content;
    public $status;
    public $active;

    function __construct($contacts_id, $fullname, $email, $phone_number, $title, $content, $status, $active)
    {
        $this->contacts_id = $contacts_id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->active = $active;
    }
}

class contactMoldel{
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
        $total_pages_sql = "SELECT COUNT(*) FROM contacts";
        $result = $this->db->select($total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        return $total_pages;
    }

    // get all data in table contact
    function getAll($offset, $no_of_records_per_page)
    {   

        $query = "SELECT * FROM contacts ORDER BY active ASC LIMIT $offset, $no_of_records_per_page";
        $data = $this->db->select($query);
        
        $result = [];
        foreach($data->fetch_all() as $value){
            array_push($result, new contact($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7]));
        }
        return $result;
    }


    // Get name contacts by id
    function getName($contacts_id){
        $query = "SELECT name FROM contacts WHERE contacts_id = '$contacts_id' ";
        $data = $this->db->select($query);
        $result = $data->fetch_assoc();
        // $cat = new contacts($result[0],$result[1],$result[2],$result[3],$result[4],$result[5]);
        return $result;
    }

     // get delete record in table post
     function delete($contacts_id)
     {
         $query = "DELETE FROM contacts WHERE contacts_id = '$contacts_id'";
         $result = $this->db->delete($query);
     }
 
     // Search by ID
     function searchByID($contacts_id)
     {
         $query = "SELECT * FROM contacts WHERE contacts_id = '$contacts_id'";
         $result = $this->db->select($query);
         return $result;
     }
 
     // Seaerch by Name
     function searchByName($name){
         $query = "SELECT * FROM contacts WHERE name = '$name' ";
         $result = $this->db->select($query);
 
         return $result;
     }

    //  Change status
     function changeStt($id, $status){
        $query = "UPDATE contacts SET status = $status WHERE contacts_id = $id";
        $result = $this->db->update($query);
    }
}