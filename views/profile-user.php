<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/ins/head.php';
// require_once __DIR__ . '/../controller/userController.php';
?>

<body>
    
    <?php
    # Header Area Start
    require_once __DIR__ . '/ins/menu.php';
    ?>
    <!--  -->
    <section class="blog-content-area">
        <div class="container-fluid p-0 ">
            <!-- Featured Post Area -->
                <!-- <div class="row"> -->
                            <div class="col-12 p-0 position-inherit">
                                <div class="background">
                                    <!-- Thumbnail -->
                                    <div class=" img-background" id="img-background">
                                       <!-- <img src="https://travelsgcc.com/wp-content/uploads/2020/06/chinh-phuc-ngon-nui-tay-bac-san-anh-dai-ngan-dep-nhu-tranh-ve-2.jpg" alt="" > -->
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
                                                <img src="img/blog-img/about-me.jpg" alt="">
                                            </div>

                                            <!-- Content -->
                                            <div class="widget-content text-center">
                                                <h4><?php echo $result["name"]; ?></h4>
                                                <!-- <img src="img/core-img/signature.png" alt=""> -->
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
                                </div>
                            </div>
                        <!-- </div> -->
                            </div>
            </div>

            
            <div class="row justify-content-end m-0 pt-3">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">

                            
                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/1.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">MAY 10, 2018 / life</p>
                                        <a href="#" class="post-title">
                                            <h4>Travel Tuesday: Answering Your Most Frequent International Transportation Questions</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/2.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">MAY 17, 2018 / Sport</p>
                                        <a href="#" class="post-title">
                                            <h4>A Closer Look At Our Front Porch Items From Lowe’s</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/3.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">MAY 22, 2018 / lifestyle</p>
                                        <a href="#" class="post-title">
                                            <h4>Wedding Guest Style: From Beach Casual to Black-Tie Formal</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/4.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">MAY 25, 2018 / Fashion</p>
                                        <a href="#" class="post-title">
                                            <h4>5 Things to Know About Dating a Bisexual</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/5.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">MAY 29, 2018 / food</p>
                                        <a href="#" class="post-title">
                                            <h4>7 Things Wealthy Women Do With Their Money That You Can Do Too</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-sm-6">
                                <div class="single-blog-post mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail">
                                        <a href="#"><img src="img/blog-img/6.jpg" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <p class="post-date">Jun 02, 2018 / SummerHoliday</p>
                                        <a href="#" class="post-title">
                                            <h4>The 10 Most Instagrammable Spots in San Diego</h4>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->

        </div>
    </section>
    <tbody>
    <?php
    # Footer Area
    require_once __DIR__ . '/ins/footer.php';

    # All Javascript Script
    require_once __DIR__ . '/ins/script.php';
    ?>

</body>

</html>