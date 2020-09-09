<?php
require_once '../model/posts.php';
$PostsModel = new postModel();
require_once '../model/user.php';
$UserModel = new userModel();
require_once '../model/categories.php';
$CategoryModel = new categoryModel();
?>

<div class="col-12 col-sm-9 col-md-6 col-lg-4">
    <div class="post-sidebar-area">
        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Title -->
            <div class="widget-title">
                <h6>About Me</h6>
            </div>
            <!-- Thumbnail -->
            <div class="about-thumbnail">
                <img src="img/blog-img/about-me.jpg" alt="">
            </div>
            <!-- Content -->
            <div class="widget-content text-center">
                <img src="img/core-img/signature.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ipsum adipisicing</p>
            </div>
        </div>

        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Title -->
            <div class="widget-title">
                <h6>Subscribe &amp; Follow</h6>
            </div>
            <!-- Widget Social Info -->
            <div class="widget-social-info text-center">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
            </div>
        </div>

        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Title -->
            <div class="widget-title">
                <h6>Latest Posts</h6>
            </div>

            <?php
            $data = $PostsModel->PostsTop(5);
            $dataLimitPost5 = $PostsModel->pushDataPost($data);
            foreach ($dataLimitPost5 as $Posts5){
                $byName = $UserModel->getName($Posts5->user_id);
                $slug5 = str_replace(' ','+',$Posts5->title);

                ?>
                <!-- Single Latest Posts -->
                <div class="single-latest-post d-flex">
                    <div class="post-thumb">
                        <img src="img/blog-img/lp1.jpg" alt="">
                    </div>
                    <div class="post-content">
                        <a href="index.php?<?=$slug5?>&c=home&a=viewSinglePost&idpost=<?=$Posts5->post_id?>" class="post-title">
                            <h6><?=$Posts5->title?></h6>

                        </a>
                        <a href="#" class="post-author" style="text-transform: capitalize;"><span>by</span> <?=$byName['name']?></a>
                    </div>
                </div>

                <?php
            }
            ?>





        </div>

        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Adds -->
            <a href="#"><img src="img/blog-img/add.png" alt=""></a>
        </div>

        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Title -->
            <div class="widget-title">
                <h6>Newsletter</h6>
            </div>
            <!-- Content -->
            <div class="newsletter-content">
                <p>Subscribe our newsletter for get notification about new updates, information discount, etc.</p>
                <form action="#" method="post">
                    <input type="email" name="email" class="form-control" placeholder="Your email">
                    <button><i class="fa fa-send"></i></button>
                </form>
            </div>
        </div>

        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area mb-30">
            <!-- Title -->
            <div class="widget-title">
                <h6>CATEGORIES</h6>
            </div>
            <!-- Tags -->
            <ol class="popular-tags d-flex flex-wrap">
                <?php
                $getAllCategory = $CategoryModel->getFullData();
                foreach ($getAllCategory as $value){
                    ?>
                    <li><a href="index.php?c=home&a=viewArchive&idcate=<?= $value->category_id?>"><?= $value->name?></a></li>
                    <?php
                }
                ?>
            </ol>
        </div>

    </div>
</div>