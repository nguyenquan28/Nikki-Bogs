<!DOCTYPE html>
<html lang="en">

<?php
require __DIR__ . '/ins-admin/headerAdmin.php';
?>

<body translate="no">
    <div class="container-fluid p-0">

        <!-- Header -->
        <?php
        require __DIR__ . '/ins-admin/menu.php';
        ?>

        <!-- container -->
        <div class="row mt-5" id="body-row">

            <!-- Side bar -->
            <?php
            require __DIR__ . '/ins-admin/sidebar.php';
            ?>

            <div class="col">
                <header class="mt-3 d-flex justify-content-between">
                    <h4>New Post</h4>
                    <button type="button" class="btn btn-outline-danger"><a href="./index.php">Back</a></button>
                </header>
                <hr>
                <div class="d-flex justify-content-center mt-4">

                    <form method="POST" action="?c=post&a=savePost" class="col-md-6 border border-info pl-5 pr-5 d-flex flex-column" role="form" method="post" id="reused_form" enctype="multipart/form-data">
                        <small class="text-danger font-italic d-flex justify-content-start mb-3">
                            <?php if (isset($_SESSION['newPostErr'])) echo Session::get('newPostErr');
                            else echo ''; ?>
                        </small>
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-sm" value="" name="category_id">
                        </div>
                        <div class="form-group">
                            <?php
                            foreach ($listCat as $value) {
                            ?>
                                <label class="radio-inline pr-3 mb-3">
                                    <input type="radio" name="categories" id="radio_experience" value="Fashion">
                                    <?= $value['name'] ?>
                                </label>
                            <?php
                            }
                            ?>
                        </div>
                        <label for="fusk">
                            <p>Click select image to upload</p>
                        </label>
                        <input id="fusk" type="file" name="post_img" class="d-none">
                        <div class="col-md-6 col-md-offset-3 form-container">
                            <div class="chose_img">
                                <img id="chose_img">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="" name="intro" placeholder="Intro">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Admin, bạn muốn chia sẻ gì nào? "></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <small class="text-danger font-italic d-flex justify-content-end mb-3">
                            <?php if (isset($_SESSION['postErr'])) echo Session::get('postErr');
                            else echo ''; ?>
                        </small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>