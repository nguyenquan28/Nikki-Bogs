<?php
require_once __DIR__ . '../../model/chat.php';
require_once __DIR__ . '../../model/user.php';
class chatController
{
    function getAll()
    {
        require_once __DIR__ . '../../views/admin/chat.php';
    }
}
