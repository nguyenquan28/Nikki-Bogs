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
        <div class="row mt-5" id="body-row">

            <!-- Side bar -->
            <?php
            require __DIR__ . '/ins-admin/sidebar.php';
            ?>

            <div class="col">

                <!-- Header -->
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4>List Posts</h4>
                    <!-- Search -->
                    <form class="form-outline col-md-3 p-0" action="index.php?c=post&a=search" method="POST">
                        <div class="md-form my-0">
                            <div>
                                <input class="form-control mr-sm-2 d-flex flex-row font-italic pr-5" name="input" type="text" id="tags" placeholder="Search for Name" aria-label="Search">
                            </div>

                            <div class="search_btn d-flex flex-row">
                                <a class="search_icon"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                    </form>
                </header>

                <!-- Alert Error -->
                <small class="text-danger font-italic d-flex justify-content-start mb-3">
                    <?php if (isset($_SESSION['erSearch'])) echo Session::get('erSearch');
                    else echo ''; ?>
                </small>

                <!-- list post -->
                <table class="table table-bordered table-striped">
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
                            <tr class=<?php if ($value->status == true) echo ' "tr-color" ';
                                        else echo '""'; ?>>
                                <td class="text-center"><?= $userName['name'] ?></td>
                                <td class="text-center"><?= $catName['name'] ?></td>
                                <td><?= $value->title ?></td>
                                <td><?= $value->intro ?></td> 
                                <td class="text-center" style="width:  8%"><?= date('d-M-Y', strtotime($value->time)) ?></th>
                                <td class="text-center" title="Detail"><a href="./index.php?c=post&a=detailPost&id=<?= $value->post_id ?>&status=<?= $value->status ?>"><i class="fas fa-info-circle"></i></a></td>
                                <td class="text-center" title="Change Active"><a href="./index.php?c=post&a=changeActive&id=<?= $value->post_id ?>&active=<?= $value->active ?>&sender_id=<?= Session::get('user_id') ?>&receiver_id=<?= $value->user_id ?>"><?= ($value->active) ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-window-close text-danger"></i>' ;?></a></td>
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
                        <li class="page-item"><a class="page-link" href="index.php?c=post&a=getAll&pageno=1">First</a></li>
                        <?php
                        if (isset($_GET['a']) && $_GET['a'] === 'search') {
                            echo '<li class="page-item"><a class="page-link" href="#">1</a></li> ';
                        } else {
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?c=post&a=getAll&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }
                        } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=post&a=getAll&pageno=<?= $total_pages; ?>">Last</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/ins-admin/scriptAdmin.php';
    ?>
    <script>
        $('#search').click(function() {
            var query = $('#tags').val();
            load_data(query);
        });
    </script>
</body>

</html>