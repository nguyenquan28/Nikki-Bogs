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
                    <i class="fa fa-camera btn-custom p-3 " id="btn-background"></i>
                    <div class="edit position-absolute p-5" id="background">
                        <form action="index.php?c=profile&a=setBackground" method="post" enctype="multipart/form-data">
                            <input type="file" name="backgroundImg" id="backgroundImg">
                            <input type="submit" value="backgroundImg" name="submit">
                        </form>
                    </div>
                    <!-- Thumbnail -->
                    <div class="img-background" id="img-background">
                        <img src="img/background-user/<?= $data["profile"]["background"] ?>" alt="">
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
                            <img src="img/avt-user/<?= $data["profile"]["avatar"] ?>" alt="">
                            <div class="camera"></div>
                        </div>
                        <div class="btn-edit">
                            <i class="fa fa-camera btn-custom" id="btn-edit"></i>
                            <!-- edit -->
                            <div class="edit" id="edit">
                                <p>Select image to upload:</p>
                                <form action="index.php?c=profile&a=setAvt" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="fileToUpload" name="submit">
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
                                    <input type="text" name="name" placeholder="nhập tên mới" id="myInput" oninput="myFunction()">
                                    <button disabled style="background:black;color:white" type="submit" id="mybtn">đổi</button>
                                </form>
                                <p id="demo"></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ipsum adipisicing</p>
                            <i class="fa fa-pencil" id="btn-introduce"></i>

                            <div class="edit" id="introduce">
                                <form action="index.php?c=profile&a=setIntroduce" method="post" autocomplete="off">
                                    <input type="text" name="introduce" placeholder="Brief introduction about yourself">
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
                                <a href="https://www.facebook.com/quoccuong0699"><i class="fa fa-twitter"></i></a>
                                <!-- <a href="#"><i class="fa fa-instagram"></i></a> -->
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
                            <!--  -->
                            <div class="row">
                                <p>Select image to upload: </p>
                                <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
                            </div>
                            <div class="row">
                                <input class="form-control" type="text" placeholder="title" name="title">
                            </div>
                            <div class="row">
                                <input class="form-control" type="text" placeholder="into" name="intro">
                            </div>
                            <!--  -->
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <textarea class="form-control" type="textarea" name="content" id="comments" placeholder="<?= !empty(Session::get('name')) ? Session::get('name') : ''; ?>, bạn muốn chia sẻ gì nào? " maxlength="6000" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button disabled type="submit" name="submit" value="upload" class="btn btn-lg btn-warning btn-block">Post </button>
                                </div>
                            </div>
                        </form>
                        <div id="success_message" style="width:100%; height:100%; display:none; ">
                            <h3>Posted your feedback successfully!</h3>
                        </div>
                        <div id="error_message" style="width:100%; height:100%; display:none; ">
                            <h3>Error</h3>
                            Sorry there was an error sending your form.

                        </div>
                    </div>
                    <!--  -->
                </div>
                <!--  -->
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
                                    <a href="#"><img src="img/post-img/' . $data["postImg"]["url"] . '" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <p class="post-date">' . $data["post"][$x]["time"] . ' / ' . '' . $data["post"][$x]["tag"] . '' . '</p>
                                    <a href="index.php?idpost=$idpost" class="post-title">
                                        <h4>' . $data["post"][$x]["title"] . '</h4>
                                    </a>
                                    <p class="post-excerpt">' . $data["post"][$x]["title"] . '...</p>
                                    <p class="post-excerpt" style="color:red;">' . $active . '</p>
                                </div>
                            </div>
                        </div>';
                                $x++;
                            }
                        }
                        ?>
                    </div>
                </div>
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
        <!--  -->
        <script>

        </script>
</body>

</html>