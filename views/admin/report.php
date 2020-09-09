<?php
    require_once __DIR__ . '../../../config/session.php';
    Session::init();
    require_once __DIR__ . '../../../model/user.php';
    $user = new userModel();
?>
<!DOCTYPE html>
<html lang="en">

<?php
require __DIR__.'/ins-admin/headerAdmin.php';
?>

<body translate="no">
    <div class="container-fluid p-0">

        <!-- Header -->
        <?php
        require __DIR__.'/ins-admin/menu.php';
        ?>

        <!-- container -->
        <div class="row mt-5" id="body-row">

            <!-- Side bar -->
            <?php
            require __DIR__.'/ins-admin/sidebar.php';
            ?>

            <div class="col">
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4>List Reports</h4>
                    
                    <form class="form-outline col-md-3 p-0" action="index.php?c=report&a=search" method="POST">

                        <div class="md-form my-0">
                            <div>
                                <input class="form-control mr-sm-2 d-flex flex-row font-italic pr-5" name="input" type="text" placeholder="Search for Name" aria-label="Search">
                            </div>

                            <div class="search_btn d-flex flex-row">
                                <a href="?c=report&a=search" class="search_icon"><i class="fas fa-search"></i></a>

                            </div>
                        </div>
                    </form>
                </header>
                <!-- Alert Error -->
                <small class="text-danger font-italic d-flex justify-content-start mb-3">
                    <?php if (isset($_SESSION['erRPSearch'])) echo Session::get('erRPSearch');
                    else echo ''; ?>
                </small>

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">User</th>
                            <th class="text-center" scope="col">Content</th>
                            <th class="text-center" >Time</th>
                            <th class="text-center" colspan="2">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key => $value) {
                            $userName = $user->getName($value['user_id']);
                            
                        ?>
                            <tr class = <?php if($value['status'] == true) echo ' "tr-color" '; else echo '""';?>>
                                <td class="text-center" ><?= $value['report_id'] ?></td>
                                <td class="text-center"><?= $userName['name'] ?></td>
                                <td class="text-center" ><?= $value['content'] ?></td>
                                <td class="text-center" ><?= date('d-M-Y', strtotime($value['report_id'])) ?></td>
                                <td class="text-center" title="Update"><a href="./index.php?c=report&a=detailReport&id=<?= $value['report_id'] ?>&status=<?= $value['status']?>&post=<?= $value['post_id'] ?>"><i class="fas fa-info-circle"></i></a></td>
                                <td class="text-center" title="Delete"><a href="./index.php?c=report&a=delReport&id=<?= $value['report_id'] ?>"><i class="far fa-trash-alt text-danger"></i></a></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Paging -->
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?c=report&a=getAll&pageno=1">First</a></li>
                        <?php
                        if (isset($_GET['a']) && $_GET['a'] === 'search') {
                            echo '<li class="page-item"><a class="page-link" href="#">1</a></li> ';
                        } else {
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?c=report&a=getAll&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }
                        } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=report&a=getAll&pageno=<?= $total_pages; ?>">Last</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php
    require __DIR__.'/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>