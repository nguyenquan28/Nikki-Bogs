<?php
require_once '../model/posts.php';
$PostsModel = new postModel();
require_once '../model/categories.php';
$CategoryModel = new categoryModel();
?>
<!---->

<section class="hero-area">
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <div class="a" style="--n: 5;">
                <div class="dot" style="--i: 0;"></div>
                <div class="dot" style="--i: 1;"></div>
                <div class="dot" style="--i: 2;"></div>
                <div class="dot" style="--i: 3;"></div>
                <div class="dot" style="--i: 4;"></div>
            </div>
        </div>
    </div>

    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post -->
        <?php
        $data = $PostsModel->PostsTop(3);
        $dataLimitPost3 = $PostsModel->pushDataPost($data);
        foreach ($dataLimitPost3 as $post3){
            $nameCategory = $CategoryModel->getName($post3->categories_id);


            ?>
            <!-- Single Hero Post -->
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img">
                    <img src="img/blog-img/14.jpg" alt="">
                </div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms"><?=$post3->time?> / <?=$nameCategory['name']?></p>
                        <a href="index.php?c=home&a=viewSinglePost&idpost=<?=$post3->post_id?>" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2><?=$post3->title?></h2>
                        </a>
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms"><?=$post3->intro?></p>
                        <a href="index.php?c=home&a=viewSinglePost&idpost=<?=$post3->post_id?>" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Read More</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>





            <?php
        }
        ?>





    </div>
</section>