<?php
require_once __DIR__ . '../../../model/categories.php';
$category = new categoryModel();
require_once __DIR__ . '../../../model/user.php';
$user = new userModel();

$catName = $category->getName($result['categories_id']);
$userName = $user->getName($result['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/ins-admin/head.php';
?>

<body>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="d-flex justify-content-between">
                        <ol class="breadcrumb d-flex flex-row">
                            <li class="breadcrumb-item"><a href="?"><i class="fa fa-home"></i> Admin</a></li>
                            <li class="breadcrumb-item"><a href="?index.php">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                        </ol>
                        <?php
                            if ($_GET['a'] == 'detailReport') {

                                $id = $_GET['id'];
                                echo '<ol class="breadcrumb">
                                        <button type="button" class="btn btn-warning mr-2"><a title="Delete Post" href="index.php?c=post&a=delPost&id=' .$id. ' ">Delete</a></button>
                                        <button type="button" class="btn btn-danger"><a title="Close" href="index.php?c=report">Cancel</a></button>
                                    </ol>';
                            }else{
                                echo '';
                            }
                        ?>
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
                        <div class="post-content">

                            <div class="text-center mb-50">
                                <p class="post-date"><?= date('d-M-Y', strtotime($result['time'])) . '/' . $catName['name'] ?></p>
                                <h2 class="post-title"><?= $result['title'] ?></h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <a href="#"><span>by <?= $userName['name'] ?></span></a>
                                </div>
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img src="../img/post-img/<?= $imgURL['url'] ?>.jpg" alt="">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>

                                <p><?= $result['content'] ?></p>
                                <!-- <blockquote class="shortcodes">
                                    <div class="blockquote-icon">
                                        <img src="../img/core-img/quote.png" alt="">
                                    </div>
                                    <div class="blockquote-text">
                                        <h5>That’s not to say you’ll have the exact same thing if you stop by: the restaurant’s menus change constantly, based on seasonal ingredients.</h5>
                                        <h6>Ollie Schneider - <span>CEO Colorlib</span></h6>
                                    </div>
                                </blockquote> -->
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <img class="mb-30" src="../img/blog-img/4.jpg" alt="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img class="mb-30" src="../img/blog-img/3.jpg" alt="">
                                    </div>
                                </div>

                                <!-- Post Tags & Share -->
                                <div class="post-tags-share">
                                    <!-- Tags -->
                                    <ol class="popular-tags d-flex flex-wrap">
                                        <?php
                                        $tags = explode(', ', $result['tag']);
                                        foreach ($tags as $tag) {
                                        ?>
                                            <li><a href="#"><?= $tag ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ol>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->

    <?php
    # Footer Area
    require_once __DIR__ . '/../ins/footer.php';
    ?>

</body>

</html>