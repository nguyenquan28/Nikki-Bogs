<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class profile{
    // public $user_id;
    // public $name;
    // public $email;
    // public $password;
    // public $gender;
    // public $birthday;
    // public $status;
    // public $permission;

    // function __construct($user_id, $name,$email,$password, $gender, $birthday, $status, $permission)
    // {   
    //     $this->user_id = $user_id;
    //     $this->name = $name;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->gender = $gender;
    //     $this->birthday = $birthday;
    //     $this->status = $status;
    //     $this->permission = $permission;
        
    // }
    function getUser($id){
        $db = new Database();
        $fm = new Format();
        $query = 'SELECT * FROM user where user_id ='.$id;
                    $data = $db->select($query);
                    $result = $data->fetch_assoc();
                    return $result;              
    }
}
   
?>