<?php
require __DIR__ . '/../model/user.php';
require __DIR__ . '/../model/posts.php';
require __DIR__ . '/../model/profile-user.php';
// require __DIR__ . '/../views/profile-user.php';


class userController{

    function profile(){

        $profile = new profile();
        $result =  $profile->getUser(0);
        return $result;
    }



}

    $profile = new userController();
    $result =  $profile->profile() ;




