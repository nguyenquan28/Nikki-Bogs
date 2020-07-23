<!DOCTYPE html>
<html lang="en">

<?php
    require_once __DIR__ . '/ins/head.php';
?>

<?php
    require_once '../model/posts.php';
    $PostsModel = new postModel();
    require_once '../model/user.php';
    $UserModel = new userModel();
    require_once '../model/categories.php';
    $CategoryModel = new categoryModel();
?>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php
        require_once __DIR__ . '/ins/menu.php';
    ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">

                            <!-- Section Heading -->
                            <div class="col-12">
                                <div class="section-heading">
                                    <?php
                                        if (isset($_GET['idcate'])){
                                            $name =  $CategoryModel->getName($_GET['idcate']);
                                            echo '<h2 style="text-transform: capitalize;">'.$name['name'].'</h2>';
                                        }else{
                                            echo '<h2>News Nikki</h2>';
                                        }
                                    ?>

                                </div>
                            </div>

                            <?php
                            $data = $PostsModel->getAllByIdCateAndPage();
                            $dataGetAllPost = $PostsModel->pushDataPost($data);
                            foreach ($dataGetAllPost as $getallpost){
                                $nameCategory = $CategoryModel->getName($getallpost->categories_id);

                            ?>

                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post mb-50">
                                        <!-- Thumbnail -->
                                        <div class="post-thumbnail">
                                            <a href="#"><img src="img/blog-img/1.jpg" alt=""></a>
                                        </div>
                                        <!-- Content -->
                                        <div class="post-content">
                                            <p class="post-date"><?=$getallpost->time?> / <?=$nameCategory['name']?></p>
                                            <a href="index.php?c=home&a=viewSinglePost&idpost=<?=$getallpost->post_id?>" class="post-title">
                                                <h4><?=$getallpost->title?></h4>
                                            </a>
                                            <p class="post-excerpt"><?=$getallpost->intro?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="index.php?a=viewArchive&page=1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <?php
                        $total_pages = $PostsModel->PostsSumPage();
                        for ($i = 1; $i <= $total_pages; $i++) {
                            ?>
                            <li class="page-item"><a class="page-link" style=" width: 46px;line-height: 28px;" href="index.php?a=viewArchive&page=<?= $i; ?>&idcate=<?=$_GET['idcate']?>"><?= $i; ?></a></li>

                        <?php } ?>
                        <li><a href="index.php?a=viewArchive&page=<?= $total_pages; ?>&idcate=<?=$_GET['idcate']?>">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-50">
                            <form class="search-form" action="#" method="post">
                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                <button><i class="fa fa-send"></i></button>
                            </form>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Categories</h6>
                            </div>

                            <ol class="nikki-catagories">
                                <?php
                                $getAllCategory = $CategoryModel->getFullData();
                                foreach ($getAllCategory as $value){
                                    ?>
                                    <li><a href="?c=home&a=viewArchive&idcate=<?=$value->category_id?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $value->name?></span> <span>(3)</span></a></li>
                                    <?php
                                }
                                ?>

                            </ol>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Latest Posts</h6>
                            </div>

                            <?php
                            $data= $PostsModel->PostsTop(5);
                            $dataLimitPost5 = $PostsModel->pushDataPost($data);
                            foreach ($dataLimitPost5 as $Posts5){
                                $byName = $UserModel->getName($Posts5->user_id);
                                ?>
                                <!-- Single Latest Posts -->
                                <div class="single-latest-post d-flex">
                                    <div class="post-thumb">
                                        <img src="img/blog-img/lp1.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="#" class="post-title">
                                            <h6><?=$Posts5->title ?></h6>
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
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Archives</h6>
                            </div>
                            <ol class="nikki-archives">
                                <li><a href="#">February 2018</a></li>
                                <li><a href="#">June 2018</a></li>
                                <li><a href="#">March 2018</a></li>
                                <li><a href="#">November 2018</a></li>
                            </ol>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
<!--                        <div class="single-widget-area mb-30">-->
<!--          -->
<!--                            <div class="widget-title">-->
<!--                                <h6>popular tags</h6>-->
<!--                            </div>-->
<!--             -->
<!--                            <ol class="popular-tags d-flex flex-wrap">-->
<!--                                <li><a href="#">Creative</a></li>-->
<!--                                <li><a href="#">Unique</a></li>-->
<!--                                <li><a href="#">Template</a></li>-->
<!--                                <li><a href="#">Photography</a></li>-->
<!--                                <li><a href="#">travel</a></li>-->
<!--                                <li><a href="#">lifestyle</a></li>-->
<!--                                <li><a href="#">Wordpress Template</a></li>-->
<!--                                <li><a href="#">food</a></li>-->
<!--                                <li><a href="#">Idea</a></li>-->
<!--                            </ol>-->
<!--                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->

    <?php
        # Instagram Area
        require_once __DIR__ . '/ins/instargam.php';

        # Footer Area
        require_once __DIR__ . '/ins/footer.php';

        ## All Javascript Script
        require_once __DIR__ . '/ins/script.php';
    ?>

</body>

</html>