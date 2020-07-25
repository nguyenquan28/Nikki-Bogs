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
        <div class="row mt-5 pt-1" id="body-row">

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
                    <form method="POST" action="?c=category&a=saveCat" class="col-md-6 border border-info p-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags" placeholder="Tags">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="des" placeholder="Description">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
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