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




require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/format.php';
require __DIR__ . '/../model/user.php';

class userController
{

    function getAll()
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $user = new userModel();
        $data = $user->getAll($offset, $no_of_records_per_page);
        $total_pages = $user->paginasion($no_of_records_per_page);

        require_once __DIR__ . '../../views/admin/user.php';
    }

    function editStatus()
    {
        $id = $_GET['id'];

        if ($_GET['status']) {
            $status = 0;
        } else {
            $status = 1;
        }

        $user = new userModel();
        $user->changeStt($id, $status);

        header('location: index.php?c=user');
    }

    function delUser()
    {
        $id = $_GET['id'];

        $user = new userModel();
        $user->delete($id);

        header('location: index.php?c=user');
    }

    function detailUser()
    {
        $id = $_GET['id'];

        $post = new userModel();
        $data = $post->searchByID($id);
        $result = $data->fetch_assoc();

        require_once __DIR__ . '../../views/admin/detailUser.php';
    }

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
                    if ($user['status'] == true) {
                        Session::set('user_id', $user['user_id']);
                        Session::set('name', $user['name']);
                        Session::set('email', $user['email']);
                        Session::set('permission', $user['permission']);
                        Session::unset('loginError');
                        header('location: home.php');
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
}

