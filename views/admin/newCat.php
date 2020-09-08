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
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4>New Category</h4>
                    <button type="button" class="btn btn-outline-info"><a href="./index.php?c=category">Back</a></button>
                </header>
                <div class="d-flex justify-content-center">
                    <form method="POST" action="?c=category&a=saveCat&p=<?= (isset($cat['category_id'])) ? 'edit' : ''; ?>" class="col-md-6 border border-info p-4">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= (isset($cat['category_id'])) ? $cat['category_id'] : ''; ?>" name="category_id" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="<?= (isset($cat['name'])) ? $cat['name'] : ''; ?>" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" class="form-control" value="<?= (isset($cat['tag'])) ? $cat['tag'] : ''; ?>" name="tags" placeholder="Tags">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" value="<?= (isset($cat['description'])) ? $cat['description'] : ''; ?>" name="des" placeholder="Description">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <small class="text-danger font-italic d-flex justify-content-end mb-3">
                            <?php if (isset($_SESSION['CatErr'])) echo Session::get('CatErr');
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