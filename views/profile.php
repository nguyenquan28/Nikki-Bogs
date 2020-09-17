<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/ins/head.php'; ?>

<body>

    <?php
    # Header Area Start
    require_once __DIR__ . '/ins/menu.php'; ?>
    <!--  -->
    <section class="blog-content-area">
        <div class="container-fluid p-0 ">
            <!-- Featured Post Area -->
            <!-- <div class="row"> -->
            <div class="col-12 p-0 position-inherit">
                <div class="background ">
                    <label for="backgroundImg" style="position: absolute;z-index: 2;">
                        <i class="fa fa-camera btn-custom p-3 " id="btn-background"></i>
                    </label>
                    <div class=" position-absolute p-5" id="background">
                        <form action="index.php?c=profile&a=setBackground" method="post" enctype="multipart/form-data">
                            <input type="file" name="backgroundImg" id="backgroundImg" class="d-none">
                            <!-- <input type="submit" value="" name="submit" id="sub_backgroundImg"  class="d-none"> -->
                            <button class="btn d-none" id="sub_background" style="position: absolute;left: 4px;z-index: 3;"><i class="fa fa-check-circle" ></i></button>
                            <!-- <p ><i class="fa fa-check-circle" for="sub_backgroundImg" style="position: absolute;z-index: 100;"></i></p> -->
                        </form>
                    </div>
                    <!-- Thumbnail -->
                    <div class="img-background" id="img-background">
                        <img id="chose_background" src="img/background-user/<?php
                                                        if ($data["profile"]["background"] == "") {
                                                            echo "background_default.jpg";
                                                        } else {
                                                            echo $data["profile"]["background"];
                                                        } ?>" alt="">
                    </div>
                    <!-- Featured Post Content -->
                </div>
            </div>
            <!--  -->
            <div class="col-3 position-absolute top-250" id="profile">
                <div class="post-sidebar-area">
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Thumbnail -->
                        <div class="about-thumbnail box">
                            <img id="chose_avt" src="img/avt-user/<?php
                                                    if ($data["profile"]["avatar"] == "") {
                                                        if ($data["profile"]["gender"] == 1) {
                                                            echo "man.jpg";
                                                        } else {
                                                            echo "women.jpg";
                                                        }
                                                    } else {
                                                        echo $data["profile"]["avatar"];
                                                    }
                                                    ?>" alt="">
                            <div class="camera"></div>
                        </div>
                        <div class="btn-edit">
                            <label for="fileToUpload">
                                <i class="fa fa-camera btn-custom " id="btn-edit"></i>
                            </label>
                            <!-- <i class="fa fa-camera btn-custom" id="btn-edit"></i> -->
                            <!-- edit -->
                            <div id="edit">
                                <form action="index.php?c=profile&a=setAvt" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="d-none">
                                    <!-- <input type="submit" value="fileToUpload" name="submit"> -->
                                <button class="btn btn-outline-light d-none" id="sub_avt" style="position: absolute;top: 129px;right: 99px;"><i class="fa fa-check-circle"></i></button>
                                </form>
                                </form>
                            </div>

                        </div>

                        <!-- Content -->
                        <div class="widget-content text-center">

                            <h4><?= $data["profile"]["name"] ?></h4>
                            <i class="fa fa-pencil custom-btn" id="btn-name"></i>
                            <div class=" edit" id="name">
                                <form action="index.php?c=profile&a=setName" method="post" autocomplete="off">
                                    <!-- <input type="text" name="name" placeholder="nhập tên mới" id="myInput" oninput="myFunction()"> -->
                                    <input type="text" name="name" placeholder="nhập tên mới" id="myInput">
                                    <button disabled style="background:black;color:white" type="submit" id="mybtn">đổi</button>
                                </form>
                                <p id="demo"></p>
                            </div>
                            <p id="introduce_form"><?= $data["profile"]["introduce"] ?></p>
                            <i class="fa fa-pencil" id="btn-introduce"></i>
                            <div class="edit" id="introduce">
                                <form action="index.php?c=profile&a=setIntroduce" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <textarea class="form-control" name="introduce" id="" cols="30" rows="5" placeholder="Brief introduction about yourself"><?= $data["profile"]["introduce"] ?></textarea>
                                    </div>
                                    <!-- <input type="text" name="introduce" placeholder="Brief introduction about yourself"> -->
                                    <button style="background:black;color:white" type="submit">ok</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area mb-30">
                        <!-- Title -->
                        <div class="widget-title">
                            <div class="widget-social-info text-center">
                                <!-- <a href="#"><i class="fa fa-email"></i></a> -->
                                <!-- <a href="https://www.facebook.com/quoccuong0699"><i class="fa fa-twitter"></i></a> -->
                                <a href="https://mail.google.com/mail/u/0/?tab=um#inbox?compose=jrjtWvNPPSDtPwnjfrrwcszHvgDcqkhHjSWcMsmlcrWKPNmfLLlhRZZjhJSrgxTBcPrkDFDz"><i class="fa fa-google"></i></a> 
                                 <!-- <h5 ><?= $data["profile"]["email"] ?></h5> -->
                            </div>
                        </div>
                        <!-- Widget Social Info -->

                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
        <div class="row justify-content-end m-0 pt-3">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <!--  -->
                <div class="imagebg"></div>
                <div class="row ">
                    <div class="col-md-6 col-md-offset-3 form-container">
                        <!--  -->
                        <div class="contact-form-area">
                            <form action="index.php?c=profile&a=setPost" role="form" method="post" id="reused_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        if ($data["category"] == []) {
                                            echo 'no categories';
                                        } else {
                                            $len = count($data["category"]);
                                            $x = 0;
                                            while ($x < $len) {
                                                echo '<label class="radio-inline pr-3">
                                            <input type="radio" name="categories" id="radio_experience" value="' . $data["category"][$x]["name"] . '">
                                            ' . $data["category"][$x]["name"] . '
                                            </label>';
                                                $x++;
                                            }
                                        } ?>
                                    </div>
                                </div>
                                <label for="fusk">
                                    <p>Click select image to upload</p>
                                </label>
                                <input id="fusk" type="file" name="post_img" class="d-none">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="title" name="title" id="title" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="into" name="intro" id="intro" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="<?= !empty(Session::get('name')) ? Session::get('name') : ''; ?>, bạn muốn chia sẻ gì nào? "></textarea>
                                </div>
                                <small class="text-danger font-italic d-flex justify-content-end mb-3">
                                    <?php if (isset($_SESSION['ConErr'])) echo Session::get('ConErr');
                                    else echo ''; ?>
                                </small>
                                <button disabled id="btn_Post" type="submit" name="submit" value="upload" class="btn nikki-btn mt-15">Submit</button>
                                <!-- <button disabled id="btn_Post" type="submit" name="submit" value="upload" class="btn btn-lg btn-warning btn-block">Post </button> -->
                            </form>
                        </div>
                        <!--  -->
                        <div id="success_message" style="width:100%; height:100%; display:none; ">
                            <h3>Posted your feedback successfully!</h3>
                        </div>
                        <div id="error_message" style="width:100%; height:100%; display:none; ">
                            <h3>Error</h3>
                            Sorry there was an error sending your form.
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3 form-container">
                        <div class="chose_img">
                            <img id="chose_img">
                        </div>
                    </div>
                    <div class="blog-posts-area">
                        <div class="row">
                            <?php
                            if ($data["post"] == []) {
                                echo '<div class="col-12 col-sm-6" style="height:300px";>
                                    <h3>bạn chưa có bài đăng nào, đăng ngay!</h3>
                                    </div>';
                            } else {
                                $len = count($data["post"]);
                                $x = 0;
                                while ($x < $len) {
                                    $active = "approved";
                                    if ($data["post"][$x]["active"] == 0) {
                                        $active = "has not been approved";
                                    }
                                    echo '<div class="col-12 col-sm-6">
                            <div class="single-blog-post mb-50">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail">
                                <!-- menu post -->
                                    <div class="position-absolute" id="toggle"><span></span>
                                        <div id="edit_menu">
                                            <ul>
                                                <li id="'.$data["post"][$x]["post_id"].'" class="edit_post"><a href="#home">edit post</a></li>
                                                <li id="'.$data["post"][$x]["post_id"].'" class="remove_post"><a href="#about">remove post</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="index.php?c=home&a=viewSinglePost&idpost='.$data["post"][$x]["post_id"].'"><img src="img/post-img/' . $data["post"][$x]["url"] . '" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div id="form_post_'.$data["post"][$x]["post_id"].'" class="post-content ">
                                    <p class="post-date">' . $data["post"][$x]["time"] . ' / ' . '' . $data["post"][$x]["tag"] . '' . '</p>
                                    <a href="index.php?c=home&a=viewSinglePost&idpost='.$data["post"][$x]["post_id"].'" class="post-title">
                                        <h4>' . $data["post"][$x]["title"] . '</h4>
                                    </a>
                                    <p class="post-excerpt">' . $data["post"][$x]["intro"] . '...</p>
                                    <p class="post-excerpt" style="color:red;">' . $active . '</p>
                                </div>
                                <div id="form_edit_'.$data["post"][$x]["post_id"].'" style="display:none;" class="contact-form-area"> 
                                    <form action="index.php?c=profile&a=editPost" role="form" method="post"  enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="title" name="title" id="title_edit" value="'.$data["post"][$x]["title"].'">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="into" name="intro" id="intro_edit" value="'.$data["post"][$x]["intro"].'">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" id="content_edit" cols="30" rows="3" placeholder="bạn muốn chia sẻ gì nào? ">'.$data["post"][$x]["content"].'</textarea>
                                    </div>
                                    <input class="d-none" type="number" value="'.$data["post"][$x]["post_id"].'" name="post_id">
                                    <button disabled id="btn_Post" type="submit" class="btn nikki-btn mt-15">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                                    $x++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!--  -->
  
                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>
            </div>
    </section>

    <tbody>
        <?php
        require_once __DIR__ . '/ins/footer.php';
        require_once __DIR__ . '/ins/script.php';
        ?>
</body>

</html>