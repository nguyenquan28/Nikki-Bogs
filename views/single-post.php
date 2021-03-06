<!DOCTYPE html>
<html lang="en">

<?php

//include __DIR__ . '/../config/session.php';
//Session::init();
require_once __DIR__ . '/ins/head.php';
?>
<?php
require_once '../model/images.php';
$ImagesModel = new imagesModel();
require_once '../model/posts.php';
$PostsModel = new postModel();
require_once '../model/user.php';
$UserModel = new userModel();
require_once '../model/categories.php';
$CategoryModel = new categoryModel();
require_once '../model/comments.php';
$CommentsModel = new commentMoldel();
require_once '../model/user.php';
$UserModel = new userModel();
require_once '../config/session.php';

Session::init();

//    session_start();
//    $_SESSION['a']='a';

?>

<body>

    <!-- ##### Header Area Start ##### -->
    <?php
    require_once __DIR__ . '/ins/menu.php';
    ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="archive-blog.php">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
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
                <div class="col-12">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <?php
                        if (isset($_GET['idpost'])) {
                            $idpost = $_GET['idpost'];
                            //tim kiem  1 bai post theo id
                            $data = $PostsModel->searchByID($idpost);
                            $SinglePost = $PostsModel->pushDataPost($data);
                            //                                print_r($SinglePost);
                            foreach ($SinglePost as $datasingle) {
                                // lay img theo id post
                                $urlImg = $ImagesModel->getImgByIdPost($datasingle->post_id);
                                //lay ten cua category theo id
                                $namecate = $CategoryModel->getName($datasingle->categories_id);
                                $countCommert = $CommentsModel->countCommentByIdPost($datasingle->post_id);
                                $nameUser = $UserModel->getName($datasingle->user_id)
                        ?>
                                <div class="post-content">

                                    <div class="text-center mb-50">
                                        <p class="post-date"><?= $datasingle->time ?> / <?= $namecate['name'] ?></p>
                                        <h2 class="post-title"><?= $datasingle->title ?></h2>
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <a href="#"><span>by</span> <?= $nameUser['name'] ?></a>
                                            <a href="#"><?= $countCommert['COUNT(comment_id)'] ?><span>Comments</span></a>
                                        </div>
                                    </div>

                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail mb-50">
                                        <img src="img/post-img/<?=$urlImg['url']?>" alt="">
                                    </div>

                                    <!-- Post Text -->
                                    <div class="post-text">
                                        <!-- Share -->
                                        <div class="post-share">

                                            <span class="mt-4">Share</span>
                                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>



                                        <!--                                            <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>-->

                                        <!--                                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves. They don’t really need to cook and cooking for a long time actually reduces their flavour and aroma.</p>-->
                                        <p><?= $datasingle->content ?></p>
                                        <!--                                            <blockquote class="shortcodes">-->
                                        <!--                                                <div class="blockquote-icon">-->
                                        <!--                                                    <img src="img/core-img/quote.png" alt="">-->
                                        <!--                                                </div>-->
                                        <!--                                                <div class="blockquote-text">-->
                                        <!--                                                    <h5>That’s not to say you’ll have the exact same thing if you stop by: the restaurant’s menus change constantly, based on seasonal ingredients.</h5>-->
                                        <!--                                                    <h6>Ollie Schneider - <span>CEO Colorlib</span></h6>-->
                                        <!--                                                </div>-->
                                        <!--                                            </blockquote>-->

                                        <!--                                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves. They don’t really need to cook and cooking for a long time actually reduces their flavour and aroma.</p>-->

                                        <!--                                            <div class="row">-->
                                        <!--                                                <div class="col-12 col-md-6">-->
                                        <!--                                                    <img class="mb-30" src="img/blog-img/4.jpg" alt="">-->
                                        <!--                                                </div>-->
                                        <!--                                                <div class="col-12 col-md-6">-->
                                        <!--                                                    <img class="mb-30" src="img/blog-img/3.jpg" alt="">-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->

                                        <!-- List -->
                                        <!--                                            <div class="nikki-list-area mb-50">-->
                                        <!--                                                <h4 class="mb-15">Immediate Dividends</h4>-->
                                        <!--                                                <ul class="nikki-list">-->
                                        <!--                                                    <li>* Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>-->
                                        <!--                                                    <li>* Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>-->
                                        <!--                                                    <li>* Remove the cooker from heat and open only after all the steam has escaped on its own.</li>-->
                                        <!--                                                    <li>* While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>-->
                                        <!--                                                    <li>* When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>-->
                                        <!--                                                    <li>* Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring. Add a little water to the pan if the masala starts to stick.</li>-->
                                        <!--                                                </ul>-->
                                        <!--                                            </div>-->

                                        <!-- Post Tags & Share -->
                                        <div class="post-tags-share d-flex justify-content-between">
                                            <?= 
                                            (isset($_SESSION['user_id'])) ? '<div>
                                            <!-- Report Post -->
                                            <div class="d-flex flex-row">
                                                <span class="mt-2">
                                                    <a href="#subReport" data-toggle="collapse" aria-expanded="false" title="Report" class="pin">
                                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                                        Report</a>
                                                </span>
                                                <!-- Modal -->
                                                <div id="subReport" class="collapse sidebar-submenu ml-3">
                                                    <div class="content-report p-2 d-flex flex-column" style="background: #e9ebee; border-radius: 5px;">
                                                        <div>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Vi phạm quy tắc&postID=' . $_GET['idpost'] . '">Vi phạm quy tắc</a>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Gây kích động&postID='. $_GET['idpost'] . '">Gây kích động</a>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Spam&postID='. $_GET['idpost'] . '">Spam</a>
                                                        </div>
                                                        <div>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Bạo lực&postID='. $_GET['idpost'] . '">Bạo lực</a>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Quấy rối&postID='. $_GET['idpost'] . '">Quấy rối</a>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Tin giả&postID='. $_GET['idpost'] . '">Tin giả</a>
                                                            <a class="btn btn-outline-dark m-1" href="index.php?c=report&a=newReport&content=Khác&postID='. $_GET['idpost'] . '">Khác</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End modal report -->
                                        </div>' : '';
                                            ?>

                                            <!-- Tags -->
                                            <ol class="popular-tags d-flex flex-wrap">
                                                <li><a href="#">HealthFood</a></li>
                                                <li><a href="#">Yoga</a></li>
                                                <li><a href="#">Life Style</a></li>
                                            </ol>

                                        </div>

                                        <!-- Related Post Area -->
                                        <div class="related-posts clearfix">
                                            <!-- Headline -->
                                            <h4 class="headline">related posts</h4>

                                            <div class="row">

                                                <!-- Single Blog Post -->
                                                <?php
                                                $datarelates = $PostsModel->RelatedByIdCateTop2($datasingle->categories_id);
                                                $relatePosts = $PostsModel->pushDataPost($datarelates);
                                                foreach ($relatePosts as $datarela) {
                                                    // lay img theo id post
                                                    $urlImg = $ImagesModel->getImgByIdPost($datarela->post_id);
                                                    $slug = str_replace(' ','+',$datarela->title);
                                                ?>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="single-blog-post mb-50">
                                                            <!-- Thumbnail -->
                                                            <div class="post-thumbnail">
                                                                <a href="#"><img src="img/post-img/<?=$urlImg['url']?>" alt=""></a>
                                                            </div>
                                                            <!-- Content -->
                                                            <div class="post-content">
                                                                <p class="post-date"><?= $datarela->time ?> / <?= $namecate['name'] ?></p>
                                                                <a href="index.php?<?=$slug?>&c=home&a=viewSinglePost&idpost=<?=$datarela->post_id?>" class="post-title">
                                                                    <h4><?= $datarela->title ?></h4>
                                                                </a>
                                                                <p class="post-excerpt"><?= $datarela->intro ?></p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>

                                        <!-- Comment Area Start -->
                                        <div class="comment_area clearfix">
                                            <h4 class="headline">Comments</h4>
                                            <ol>
                                                <?php
                                                $datacmts = $CommentsModel->searchByIdPost($datasingle->post_id);
                                                if (!empty($datacmts)){
                                                    $datacmt = $CommentsModel->pushDataComment($datacmts);
                                                    foreach ($datacmt as $datacmt) {
                                                        $nameUser = $UserModel->getName($datacmt->user_id);
                                                        $imguser = $UserModel->getimguser($datacmt->user_id);
                                                    ?>
                                                        <li class="single_comment_area">
                                                            <div class="comment-wrapper d-flex">
                                                                <!-- Comment Meta -->
                                                                <div class="comment-author">
                                                                    <img src="img/avt-user/<?=$imguser['avatar']?>" alt="">
                                                                </div>
                                                                <!-- Comment Content -->
                                                                <div class="comment-content">
                                                                    <span class="comment-date"><?= $datacmt->time ?></span>
                                                                    <h5><?= $nameUser['name'] ?></h5>
                                                                    <p><?= $datacmt->content ?></p>

                                                                </div>
                                                            </div>
    <!--                                                            <div class="reply">-->
    <!--                                                                <a href="javascript:void(0)" onclick="reply(this)">Reply</a>-->
    <!--                                                            </div>-->


                                                        </li>
                                                <?php
                                                }}
                                                ?>
                                                <!-- Single Comment Area -->


                                            </ol>

                                            <!-- Comment Area Start -->
                                            <!--                                                <div class="row repdyrow" style="display: none">-->
                                            <!--                                                    <div class="col-12">-->
                                            <!--                                                        <div class="form-group">-->
                                            <!--                                                            <textarea class="form-control" name="message" id="replyComment" cols="30" rows="2" placeholder="Comment"></textarea>-->
                                            <!--                                                        </div>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <div class="leave-comment-area clearfix">
                                                <div class="comment-form">
                                                    <h4 class="headline">Leave A Comment</h4>
                                                    <small class="text-danger font-italic d-flex justify-content-start mb-3">
                                                        <?php
                                                        if (isset($_SESSION['ErrComment'])) {
                                                            echo Session::get('ErrComment');
                                                        }
                                                        ?>
                                                    </small>
                                                    <form method="post">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn nikki-btn">Send Message</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <?php

                                                    if (isset($_SESSION['user_id'])) {
                                                        Session::unset('ErrComment');
                                                        if (isset($_POST['message'])) {
                                                            $user = Session::get('user_id');
                                                            //                                                                print_r($user);
                                                            //                                                                die();
                                                            $postid = $datasingle->post_id;
                                                            $comment = $_POST['message'];
                                                            $today = date("Y-m-d");
                                                            $comment = new comment('', $user, $postid, $comment, 1, 1, $today);
                                                            $result = $CommentsModel->saveComment($comment);
                                                            //
                                                        }
                                                    } else {
                                                        Session::set('ErrComment', 'You need to log in to comment!');
                                                    }
                                                    ?>

                                                    <!-- Comment Form -->

                                                </div>
                                            </div>

                                        </div>
                                    </div>



                            <?php
                            }
                        }
                            ?>
                                </div>
                    </div>


                        </div>
                    </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
    <!--    <script>-->
    <!--        function reply(caller) {-->
    <!--            debugger;-->
    <!--            console.log(caller);-->
    <!--            document.write(caller);-->
    <!--            $(".repdyrow").insertAfter($(caller));-->
    <!--            $(".repdyrow").show();-->
    <!--        }-->
    <!--    </script>-->
    <?php
    # Instagram Area
    require_once __DIR__ . '/ins/instargam.php';
    # Footer Area
    require_once __DIR__ . '/ins/footer.php';
    # All Javascript Script
    require_once __DIR__ . '/ins/script.php';
    ?>

</body>

</html>