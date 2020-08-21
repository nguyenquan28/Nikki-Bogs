<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/ins/head.php';
?>

<body>
<?php
require_once '../model/posts.php';
$PostsModel = new postModel();
require_once '../model/user.php';
$UserModel = new userModel();
require_once '../model/categories.php';
$CategoryModel = new categoryModel();
require_once '../model/comments.php';
$CommentModel = new commentMoldel();
# Header Area Start
require_once __DIR__ . '/ins/menu.php';

# Hero Area Start
require_once __DIR__ . '/ins/content.php';
?>

<!-- ##### Blog Content Area End ##### -->
<section class="blog-content-area section-padding-100">
    <div class="container">

        <div class="row justify-content-center">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <div class="row">

                        <?php
                        //lay du lieu bai post dau tien
                        $data = $PostsModel->PostsTop(1);
                        $dataLimitPost1 =$PostsModel->pushDataPost($data);
                        foreach ($dataLimitPost1 as $post1){
                            //lay name tag theo id cate cua post
                            $nameCategory = $CategoryModel->getName($post1->categories_id);
                            //lay name user theo id cate cua post
                            $nameUser = $UserModel->getName($post1->user_id);
                            $countComment = $CommentModel->countCommentByIdPost($post1->post_id);
                            ?>
                            <div class="col-12">
                                <div class="featured-post-area mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail mb-30">
                                        <a href="#"><img src="img/blog-img/12.jpg" alt=""></a>
                                    </div>
                                    <!-- Featured Post Content -->
                                    <div class="featured-post-content">
                                        <p class="post-date"><?=$post1->time?> / <?=$nameCategory['name']?></p>
                                        <a href="index.php?c=home&a=viewSinglePost&idpost=<?=$post1->post_id?>" class="post-title">
                                            <h2><?=$post1->title?></h2>
                                        </a>
                                        <p class="post-excerpt"><?=$post1->intro?></p>
                                    </div>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex align-items-center justify-content-between">
                                        <!-- Author Comments -->
                                        <div class="author-comments">
                                            <a href="#"><span>by</span>  <?=$nameUser['name']?></a>
                                            <a href="#"><?=$countComment['COUNT(comment_id)']?><span> Comments</span></a>
                                        </div>
                                        <!-- Social Info -->
                                        <div class="social-info">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                        <!-- Featured Post Area -->


                        <!-- Single Blog Post -->
                        <?php
                        $data = $PostsModel->GetAllPostsPage();
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

<<<<<<< HEAD
                <!-- Pager -->

                <ol class="nikki-pager">
                    <li><a href="index.php?page=1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                    <?php
                    $total_pages = $PostsModel->PostsSumPage();
                    for ($i = 1; $i <= $total_pages; $i++) {
                        ?>

                        <li class="page-item"><a class="page-link" style=" width: 46px;line-height: 28px;" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>

                    <?php } ?>
                    <li><a href="index.php?page=<?= $total_pages; ?>">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                </ol>
=======
                <!-- Blog Sidebar Area -->
                <?php
                require_once __DIR__ . '/ins/sidebar.php';
                ?>
>>>>>>> origin/quandt
            </div>

            <!-- Blog Sidebar Area -->
            <?php
            require_once __DIR__ . '/ins/sidebar.php';
            ?>
        </div>
<<<<<<< HEAD
    </div>
</section>

<?php
# Instagram Area Start
require_once __DIR__ . '/ins/instargam.php';

# Footer Area Start
require_once __DIR__ . '/ins/footer.php';

# All Javascript Script
require_once __DIR__ . '/ins/script.php';
?>
<!-- Paging -->

=======
    </section>

    <?php
    # Instagram Area Start
    require_once __DIR__ . '/ins/instargam.php';

    # Footer Area Start
    require_once __DIR__ . '/ins/footer.php';

    # All Javascript Script
    require_once __DIR__ . '/ins/script.php';
    ?>
>>>>>>> origin/quandt

</body>

</html>