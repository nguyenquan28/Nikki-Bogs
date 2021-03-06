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
        $query = 'SELECT * FROM posts left JOIN images ON posts.post_id=images.post_id where user_id = ' . $id;
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
    function setPost($title, $intro, $content, $categories_name, $id, $post_img)
    {
        $query = 'SELECT * FROM categories where name = "' . $categories_name . '"';
        $categories = $this->db->select($query)->fetch_assoc();
        $tag = $categories["tag"];
        $categoris_id = $categories["categories_id"];
        $description = $categories["description"];
        $slug = $categories["slug"];
        $time = (date("Y-m-d", time()));
        $query = 'INSERT INTO `posts`(`categories_id`,`title`,`intro`, `content`, `tag`,`description`,`slug`,`active`, `time`, `status`,`user_id`) VALUES (' . $categoris_id . ',"' . $title . '","' . $intro . '","' . $content . '","' . $tag . '","' . $description . '","' . $slug . '",0,"' . $time . '",1,' . $id . ')';
        $result = $this->db->insert($query);
        $post_id = 'SELECT post_id FROM posts where user_id = ' . $id . ' ORDER BY post_id DESC LIMIT 1';
        $result_post_id = $this->db->select($post_id)->fetch_assoc();
        $query_img = 'INSERT INTO `images`(`url`, `post_id`) VALUES ("' . $post_img . '",' . $result_post_id["post_id"] . ')';
        $insert_img = $this->db->insert($query_img);
    }
    function editPost($title, $intro, $content, $id_post)
    {
        $query =  'UPDATE `posts` SET `title` = "' . $title . '", `intro` = "' . $intro . '", `content` = "' . $content . '" WHERE (`post_id` = "' . $id_post . '")';
        $result = $this->db->update($query);
    }
    function removePost($id_post)
    {
        $query_img = 'SELECT url FROM images where post_id = '.$id_post;
        $img_name = $this->db->select($query_img)->fetch_assoc();
        $delete_img_post = 'DELETE FROM `images` WHERE (`post_id` = ' . $id_post . ')';
        $delete = $this->db->delete($delete_img_post);
        $query = 'DELETE FROM `posts` WHERE (`post_id` = ' . $id_post . ')';
        $result = $this->db->delete($query);
        if (file_exists('../views/img/post-img/'.$img_name["url"])) {
            unlink('../views/img/post-img/'.$img_name["url"]);
        }
        // unlink('../views/img/post-img/image5.jpg');
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
    function setBackground($background, $id)
    {
        $query = 'UPDATE user SET background = "' . $background . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
    }
    function setAvt($avt, $id)
    {
        $query_avt = 'SELECT avatar FROM user where user_id = '.$id;
        $avt_name = $this->db->select($query_avt)->fetch_assoc();
        $query = 'UPDATE user SET avatar = "' . $avt . '" WHERE user_id =' . $id;
        $result = $this->db->update($query);
        if (file_exists('../views/img/avt-user/'.$avt_name["avatar"])) {
            unlink('../views/img/avt-user/'.$avt_name["avatar"]);
        }
    }
    function upImg($folder, $form_name)
    {
        $target_dir = "../views/img/" . $folder . "/";
        $target_file = $target_dir . basename($_FILES[$form_name]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$form_name]["tmp_name"]);
            if ($check !== false) {
            echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES[$form_name]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$form_name]["tmp_name"], $target_file)) {
                echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
                die();
            } else {
                // echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    function redirect(){
        echo "<script type='text/javascript'> document.location = 'index.php?c=profile&a=profileController'; </script>";
    }
}
