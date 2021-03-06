<!DOCTYPE html>
<html lang="en">

<?php
//include __DIR__ . '/../config/session.php';
//Session::init();

require_once __DIR__ . '/ins/head.php';
?>

<?php
    require_once '../model/posts.php';
    $PostsModel = new postModel();
    require_once '../model/user.php';
    $UserModel = new userModel();
    require_once '../model/categories.php';
    $CategoryModel = new categoryModel();
    require_once '../model/images.php';
    $ImagesModel = new imagesModel();
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
<!--                                <small class="text-danger font-italic d-flex justify-content-start mb-3">-->
<!--                                   -->
<!--                                    if (isset($_SESSION['ErrSearchHome'])) {-->
<!--                                        echo Session::get('ErrSearchHome');-->
<!--                                    }-->
<!--                                   -->
<!--                                </small>-->
                            </div>

                            <?php
                            if(isset($_GET['st'])){
                                $data = $PostsModel->searchLikeTitle();
//                               if (empty($data)){
//                                    Session::set('ErrSearchHome', 'Input not match!');

//                                }
                            }else{
//                                Session::unset('ErrSearchHome');
                                $data = $PostsModel->getAllByIdCateAndPage();
                            }


//
//                            if (isset($_GET['sc'])) {
//                                $data = $PostsModel->getAllByIdCateAndPage();
//                                if (empty($data)) {
//                                    Session::set('ErrSearchCate', 'Input not match!');
//                                    $data = $PostsModel->GetAllPostsPage();
//                                }
//                            } else {
//                                Session::unset('ErrSearchCate');
//                                $data = $PostsModel->getAllByIdCateAndPage();
//                            }


//                            if(isset($_GET['st'])){
//                                $data = $PostsModel->searchLikeTitle();
//                                if (empty($data)){
//                                    Session::set('ErrSearchHome', 'Input not match!');
//                                    $data = $PostsModel->GetAllPostsPage();
//                                }
//                            }else if(isset($_GET['sc'])){
//                                $data = $PostsModel->getAllByIdCateAndPage();
//                                if (empty($data)) {
//                                    Session::set('ErrSearchCate', 'Input not match!');
//                                    $data = $PostsModel->GetAllPostsPage();
//                                }
//                            }else{
//                                Session::unset('ErrSearchHome');
//                                Session::unset('ErrSearchCate');
//                                $data = $PostsModel->getAllByIdCateAndPage();
//                            }



                            if (!empty($data)){
                                $dataGetAllPost = $PostsModel->pushDataPost($data);
                                foreach ($dataGetAllPost as $getallpost){
                                    // lay img theo id post
                                    $urlImg = $ImagesModel->getImgByIdPost($getallpost->post_id);

                                    $nameCategory = $CategoryModel->getName($getallpost->categories_id);
                                    $slug = str_replace(' ','+',$getallpost->title);

                                ?>

                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post mb-50">
                                            <!-- Thumbnail -->
                                            <div class="post-thumbnail">
                                                <a href="#"><img src="img/post-img/<?=$urlImg['url']?>" alt=""></a>
                                            </div>
                                            <!-- Content -->
                                            <div class="post-content">
                                                <p class="post-date"><?=$getallpost->time?> / <?=$nameCategory['name']?></p>
                                                <a href="index.php?<?=$slug?>&c=home&a=viewSinglePost&idpost=<?=$getallpost->post_id?>" class="post-title">
                                                    <h4><?=$getallpost->title?></h4>
                                                </a>
                                                <p class="post-excerpt"><?=$getallpost->intro?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                            }
                            }else{

                             ?>
                                <div class="col-12 mb-3" style="background: #d0d0d0">
                                    <h5 class="mt-3 mb-3 d-flex justify-content-center">No results were found</h5>
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
                        for ($i = 1; $i <= $total_pages; $i++) {?>
                            <li class="page-item"><a class="page-link" style=" width: 46px;line-height: 28px;" href="index.php?a=viewArchive&page=<?= $i; ?>&idcate=<?=$_GET['idcate']?>"><?= $i; ?></a></li>
                        <?php } ?>

                        <?php
                            if(isset($_GET['idcate'])){
                        ?>
                                <li><a href="index.php?a=viewArchive&page=<?= $total_pages; ?>&idcate=<?=$_GET['idcate']?>">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                        <?php }else{?>
                                <li><a href="index.php?a=viewArchive&page=<?= $total_pages; ?>">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                        <?php } ?>


                    </ol>

                </div>


                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
<!--                        <div class="single-widget-area mb-50">-->
<!--                            <form class="search-form" action="#" method="post">-->
<!--                                <input type="search" name="search" class="form-control" placeholder="Search...">-->
<!--                                <button><i class="fa fa-send"></i></button>-->
<!--                            </form>-->
<!--                        </div>-->

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Categories</h6>
                            </div>

                            <ol class="nikki-catagories">
                                <?php
                                // lay ra tat ca du lieu cua ban category la show ra name
                                $getAllCategory = $CategoryModel->getFullData();
//                                print_r($getAllCategory);
                                foreach ($getAllCategory as $value){
//                                    print_r( $value);
                                    //dem so luong bai post theo tag
                                    $countpost=$PostsModel->countPostByIdCate($value->category_id);
//                                    print_r($countpost);
                                    if($countpost['COUNT(post_id)']<= 0){
                                ?>
                                    <li><a href="?c=home&a=viewArchive&idcate=<?=$value->category_id?>&sc=1 "><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $value->name?></span> <span>(<?=$countpost['COUNT(post_id)']?>)</span></a></li>
                                <?php }else{ ?>
                                    <li><a href="?c=home&a=viewArchive&idcate=<?=$value->category_id?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $value->name?></span> <span>(<?=$countpost['COUNT(post_id)']?>)</span></a></li>
                                <?php
                                    }

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
                                // lay img theo id post
                                $urlImg = $ImagesModel->getImgByIdPost($Posts5->post_id);
                                $byName = $UserModel->getName($Posts5->user_id);
                                $slug5 = str_replace(' ','+',$Posts5->title);

                                ?>
                                <!-- Single Latest Posts -->
                                <div class="single-latest-post d-flex">
                                    <div class="post-thumb">
                                        <img src="img/post-img/<?=$urlImg['url']?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="index.php?<?=$slug5?>&c=home&a=viewSinglePost&idpost=<?=$Posts5->post_id?>" class="post-title">

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