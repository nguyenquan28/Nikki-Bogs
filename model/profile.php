<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/../config/connectDB.php';
require_once __DIR__ . '/../config/format.php';
class profileModel
{
    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    function getAllPost($id)
    {
        $query = 'SELECT * FROM posts where user_id = ' . $id;
        if ($result = $this->db->select($query)) {
            return $result->fetch_all(1);
        } else {
            return $result = [];
        }
    }
    function getProfile($id)
    {
        $query = 'SELECT * FROM user where user_id =' . $id;
        return $result = $this->db->select($query)->fetch_assoc();
    }
    function getCategory()
    {
        $query = 'SELECT * FROM categories where active = 1';
        return $result = $this->db->select($query)->fetch_all(1);
    }
    function setPost($title,$intro, $content, $categories_name,$id)
    {
        $query = 'SELECT * FROM categories where name = "'.$categories_name.'"';
        $categories = $this->db->select($query)->fetch_assoc();
        $tag = $categories["tag"];
        $categoris_id = $categories["categories_id"];
        $description = $categories["description"];
        $slug = $categories["slug"];
        $time = (date("Y-m-d",time()));
        $query = 'INSERT INTO `posts`(`categories_id`,`title`,`intro`, `content`, `tag`,`description`,`slug`,`active`, `time`, `status`,`user_id`) VALUES ('.$categoris_id.',"'.$title.'","'.$intro.'","'.$content.'","'.$tag.'","'.$description.'","'.$slug.'",0,"'.$time.'",0,'.$id.')';
        $result = $this->db->insert($query);
    }
    function setIntroduce($introduce, $id)
    {
        $query = 'UPDATE user SET introduce = "' . $introduce . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
    }
    function setName($name, $id)
    {
        $query = 'UPDATE user SET name = "' . $name . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
    }
    function getPostImg($id)
    {
        $post_id = 'SELECT post_id from posts where user_id = ' . $id;
        $getpost_id = $this->db->select($post_id)->fetch_assoc();
        $query = 'SELECT url from images where post_id =' . $getpost_id["post_id"];
        $result = $this->db->select($query)->fetch_assoc();
        return $result;
    }
    function setBackground($background, $id)
    {
        $query = 'UPDATE user SET background = "' . $background . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
    }
    function upBackground()
    {
        $target_dir = "../views/img/background-user/";
        $target_file = $target_dir . basename($_FILES["backgroundImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["backgroundImg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["backgroundImg"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["backgroundImg"]["tmp_name"], $target_file)) {
                header("Location: ../views/index.php?c=profile");
                die();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    function setAvt($avt, $id)
    {
        $query = 'UPDATE user SET avatar = "' . $avt . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
    }
    function upAvt()
    {
        $target_dir = "../views/img/avt-user/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // header("Location:../views/index.php?c=profile&a=profileController");
                die();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
