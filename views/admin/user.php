<!DOCTYPE html>
<html lang="en">

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
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
                    <h4>List User</h4>

                    <!-- Search -->
                    <form class="form-outline col-md-3 p-0" action="index.php?c=user&a=search" method="POST">
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
                    <?php if (isset($_SESSION['UserSearchErr'])) echo Session::get('UserSearchErr');
                    else 
                        if(isset($_SESSION['UserResults'])) echo Session::get('UserResults');
                    else echo ''; ?>
                </small>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Gender</th>
                            <th class="text-center" scope="col">Birthday</th>
                            <th class="text-center" colspan="2">Control</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data->fetch_all() as $key => $value) {
                        ?>
                            <tr class=<?php if ($value['6'] == true) echo ' "tr-color" ';
                                        else echo '""'; ?>>
                                <td class="text-center"><?= $value['0'] ?></td>
                                <td class="text-center"><?= $value['1'] ?></td>
                                <td class="text-center"><?= $value['2'] ?></td>
                                <td class="text-center"><?php if ($value['4']) echo 'Man';
                                                        else echo 'Woman'; ?></td>
                                <td class="text-center"><?= date('d-M-Y', strtotime($value['5'])) ?></td>
                                <td class="text-center" title="Change"><a href="./index.php?c=user&a=lockAcc&id=<?= $value['0'] ?>"> <?= (strtotime($value['8']) < time()) ? '<i class="fas fa-unlock"></i>' : '<i class="fas fa-lock text-danger"></i>'; ?> </a></td>
                                <td class="text-center" title="Delete"><a href="./index.php?c=user&a=delUser&id=<?= $value['0'] ?>"><i class="far fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Paging -->
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?c=user&a=getAll&pageno=1">First</a></li>
                        <?php
                        if (isset($_GET['a']) && $_GET['a'] === 'search') {
                            echo '<li class="page-item"><a class="page-link" href="#">1</a></li> ';
                        } else {
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?c=user&a=getAll&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }
                        } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=user&a=getAll&pageno=<?= $total_pages; ?>">Last</a></li>
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