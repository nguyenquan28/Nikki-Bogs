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
                    <h3>List Contact</h3>
                </header>

                <!-- list post -->
                <table class="table">
                    <thead>
                        <tr class="thead-dark">
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
                                <th class="text-center"><?= $value->fullname ?></th>
                                <th class="text-center"><?= $value->email ?></th>
                                <th class="text-center"><?= $value->phone_number ?></th>
                                <th class="text-center"><?= $value->content ?></th>
                                <th class="text-center"><?= $value->title ?></th>
                                <td class="text-center" title="Send Email"><a href="./index.php?c=contact&a=sendMail&id=<?= $value->contacts_id ?>&status=<?= $value->status ?>"><i class="fas fa-envelope-open-text"></i></a></td>
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