<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';

class profile{
    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }  
    function getUserByID(){
        $query = 'SELECT * FROM user where user_id = 1';
        $result = $this->db->select($query);
        return $result;
    }
}
   
?>