<?php
require_once __DIR__ . '../../../config/session.php';
Session::init();

// date_default_timezone_set('Asia/Ho_Chi_Minh');
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

                <!-- Form create post -->
                <p class="text-danger mt-2">
                    <?php if (!empty($_SESSION['errorAdd'])) echo $_SESSION['errorAdd']; ?>
                </p>
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4>List Contact</h4>

                    <form class="form-outline col-md-3 p-0" action="index.php?c=contact&a=search" method="POST">
                        <div class="md-form my-0">
                            <div>
                                <input class="form-control mr-sm-2 d-flex flex-row font-italic pr-5" name="input" type="text" id="tags" placeholder="Search for Name" aria-label="Search">
                            </div>
                            
                            <div class="search_btn d-flex flex-row">
                                <a class="search_icon" ><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                    </form>
                </header>

                <!-- list post -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Author</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Phone</th>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Content</th>
                            <th class="text-center" colspan="1"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $value) {
                        ?>
                            <tr class = <?php if($value->status == true) echo ' "tr-color" '; else echo '""';?>> 
                                <td class="text-center"><?= $value->fullname ?></td>
                                <td class="text-center"><?= $value->email ?></td>
                                <td class="text-center"><?= $value->phone_number ?></td>
                                <td class="text-center"><?= $value->content ?></td>
                                <td class="text-center"><?= $value->title ?></td>
                                <td class="text-center" title="Send Email"><a href="./index.php?c=contact&a=sendMail&id=<?= $value->contacts_id ?>&status=<?= $value->status ?>"> <?= ($value->status == 0) ? '<i class="fas fa-envelope-open-text"></i>' : '<i class="far fa-envelope"></i>'; ?></a></td>
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
                        <?php
                            if(isset($_GET['a']) && $_GET['a'] === 'search'){
                                echo '<li class="page-item"><a class="page-link" href="#">1</a></li> ';
                            }else{
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?c=admin&a=post&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }} ?>
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