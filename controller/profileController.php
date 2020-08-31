<?php
require __DIR__ . '/../model/profile-user.php';
require __DIR__ . '/../model/contacts.php';
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/format.php';

class profileController
{
    function __construct()
    {
        $pro = new profile();
        $data = $pro->getUserByID();
        $result = $data->fetch_assoc();
        print_r($result);
        require_once __DIR__ . '../../views/profile-user.php';
    }

}