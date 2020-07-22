<?php
require_once __DIR__ . '../../../config/session.php';
Session::init();
require_once __DIR__ . '../../../model/categories.php';
$category = new categoryModel();
require_once __DIR__ . '../../../model/user.php';
$user = new userModel();

date_default_timezone_set('Asia/Ho_Chi_Minh');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>
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

                <!-- Form create post -->
                <p class="text-danger mt-2">
                    <?php if (!empty($_SESSION['errorAdd'])) echo $_SESSION['errorAdd']; ?>
                </p>
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h3>List Posts</h3>
                </header>

                <!-- list post -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Author</th>
                            <th class="text-center" scope="col">Category</th>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Intro</th>
                            <th class="text-center" scope="col-2">Post-day</th>
                            <th class="text-center" colspan="3">Control</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $value) {
                            $catName = $category->getName($value->categories_id);
                            $userName = $user->getName($value->user_id);
                        ?>
                            <tr class = <?php if($value->status == true) echo ' "tr-color" '; else echo '""';?> >
                                <th class="text-center"><?= $userName['name'] ?></th>
                                <th class="text-center"><?= $catName['name'] ?></th>
                                <th><?= $value->title ?></th>
                                <th><?= $value->intro ?></th>
                                <th class="text-center" style="width:  8%"><?= date('d-M-Y', strtotime($value->time)) ?></th>
                                <td class="text-center" title="Delete"><a href="./index.php?c=post&a=detailPost&id=<?= $value->post_id ?>"><i class="fas fa-info-circle"></i></a></td>
                                <td class="text-center" title="Updata"><a href="./index.php?c=post&a=editStatus&id=<?= $value->post_id ?>&status=<?= $value->status ?>"><i class="fas fa-tools text-warning"></i></a></td>
                                <td class="text-center" title="Delete"><a href="./index.php?c=post&a=delPost&id=<?= $value->post_id ?>"><i class="far fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Paging -->
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?c=admin&a=post&pageno=1">First</a></li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="index.php?c=admin&a=post&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=admin&a=post&pageno=<?= $total_pages; ?>">Last</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>