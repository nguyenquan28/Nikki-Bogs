<?php

require_once __DIR__ . '../../model/chat.php';
require_once '../model/posts.php';
class homeController
{
    function ViewHome()
    {
        if (Session::get('user_id') != 1) {
            $chat = new chatModel();
            $sender_id = Session::get('user_id');
            $detail_chat = $chat->searchById(1, $sender_id);
            // echo "<pre>";
            // print_r($detail_chat);
            // echo "</pre>";
            $max = 0;
            foreach ($detail_chat as $key => $value) {
                if ($value['receiver_id'] == $sender_id) {
                    $max = $key;
                }
            }
            // print_r($max);
            if ($detail_chat[$max]['status']) {
                Session::set('newMess', '<i class="fa fa-circle text-primary" style="position: absolute;
            font-size: 9px;"></i>');
            } else {
                Session::set('newMess', '');
            }
        }
        // echo Session::get('newMess');
        require_once '../views/home.php';
    }

    //    function a(){
    //        $a = new postModel();
    //        print_r($a->getAllByIdCateAndPage());
    //
    //    }
    function viewArchive()
    {
        require_once '../views/archive-blog.php';
    }
    function viewSinglePost()
    {
        require_once '../views/single-post.php';
    }
}
