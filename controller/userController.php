<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/format.php';
require __DIR__ . '/../model/user.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
class userController
{

    // Get all record
    function getAll()
    {   
        Session::unset('UserResults');

        // panigation
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $user = new userModel();

        // get all accounts status = 1
        $user->updateSTT();

        // get all
        $data = $user->getAll($offset, $no_of_records_per_page);
        $total_pages = $user->paginasion($no_of_records_per_page);

        $new = $user->countStt()->fetch_assoc();
        Session::set('userNew', $new['COUNT(*)']);


        require_once __DIR__ . '../../views/admin/user.php';
    }

    // Edit status
    function editStatus()
    {
        $id = $_GET['id'];

        $status = ($_GET['status']) ? 0 : 0;

        $user = new userModel();
        $user->changeStt($id, $status);

        header('location: index.php?c=user');
    }

    // Delete User
    function delUser()
    {
        $id = $_GET['id'];

        $user = new userModel();
        $user->delete($id);

        header('location: index.php?c=user');
    }

    // Login
    function login()
    {   

        if (!empty($_POST['email']) && !empty($_POST['pass'])) {
            $email = $_POST['email'];
            $userModel = new userModel();
            $result = $userModel->searchByEmai($email);
            if ($result) {
                $user = $result->fetch_assoc();
                print_r($user);
                if (MD5($_POST['pass']) == $user['password']) {
                    // print_r(strtotime($user['lock_time']));
                    // echo '<br>';
                    // print_r(time());
                    // echo ' / ' . $user['lock_time'];
                    if (strtotime($user['lock_time']) < time()) {
                        Session::set('user_id', $user['user_id']);
                        Session::set('name', $user['name']);
                        Session::set('email', $user['email']);
                        Session::set('permission', $user['permission']);
                        Session::set('avatar', $user['avatar']);
                        Session::unset('loginError');
                        header('location: ../views');
                    } else {
                        Session::set('loginError', 'Acount was locked');
                        header('location: login.php');
                    }
                } else {
                    Session::set('loginError', 'Password not match');
                    header('location: login.php');
                }
            } else {
                Session::set('loginError', 'Email not match');
                header('location: login.php');
            }
        } else {
            Session::set('loginError', 'Input must be not empty');
            header('location: login.php');
        }
    }

    // Register
    function register()
    {
        $userModel = new userModel();
        $fm = new Format();
        if (!empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['re-pass'])) {
            if ($_POST['re-pass'] == $_POST['pass']) {
                if ($userModel->searchByEmai($_POST['email'])) {
                    Session::set('registerError', 'Email was existed');
                    header('location: register.php');
                } else {
                    Session::unset('registerError');
                    $name = $fm->validation($_POST['name']);
                    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
                    $email = $fm->validation($_POST['email']);
                    $pass = MD5($fm->validation($_POST['pass']));
                    $gender = $_POST['gender'];
                    $status = 1;
                    $permission = 0;
                    $user = new user($name, $email, $pass, $gender, $birthday, $status, $permission);
                    $userModel->insert($user);
                    header('location: login.php');
                }
            } else {
                Session::set('registerError', 'Please enter your password');
                header('location: register.php');
            }
        } else {
            Session::set('registerError', 'Please enter your personal information');
            header('location: register.php');
        }
    }

    // LogOut
    function logout()
    {
        Session::destroy();
        header('location: home.php');
    }

    // Search All
    function search()
    {
        $user = new userModel();
        if (isset($_POST["input"])) {
            $search = str_replace(", ", "|", $_POST["input"]);
            $data = $user->search($search);
            if (!empty($data)) {
                Session::unset('UserSearchErr');
                Session::set('UserResults', 'Results for ' . $_POST["input"]);
                require_once __DIR__ . '../../views/admin/user.php';
            } else {
                Session::set('UserSearchErr', 'No results for ' . $_POST["input"]);
                header('location: index.php?c=user');
            }
        } else {
            Session::set('UserSearchErr', 'No results for ' . $_POST["input"]);
            header('location: index.php?c=user');
        }
    }

    // lock Account
    function lockAcc(){
        $id = $_GET['id'];
        $user = new userModel();
        $data = $user->searchByID($id)->fetch_assoc();
        // print_r($data['lock_time']);
        
        $time = (strtotime($data['lock_time']) < time()) ? date('Y-m-d H:i:s', strtotime('+3 day')) : date('Y-m-d H:i:s', strtotime('-3 day')) ;
        $data = $user->lock($id, $time);
        header('location: index.php?c=user');
    }

}
