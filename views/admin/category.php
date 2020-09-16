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
                    <h4>List Category</h4>

                    <!-- Search -->
                    <div class="col-md-4 d-flex justify-content-between">
                        <form class="form-outline col-md-7 p-0" action="index.php?c=category&a=search" method="POST">
                            <div class="md-form my-0">
                                <div>
                                    <input class="form-control mr-sm-2 d-flex flex-row font-italic pr-5" name="input" type="text" id="tags" placeholder="Search for Name" aria-label="Search">
                                </div>

                                <div class="search_btn d-flex flex-row">
                                    <a class="search_icon"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                        </form>

                        <!-- New category -->
                        <button type="button" class="btn btn-outline-info"><a href="./index.php?c=category&a=newCat">New Category</a></button>
                    </div>
                </header>

                <!-- Alert Error -->
                <small class="text-danger font-italic d-flex justify-content-start mb-3">
                    <?php if (isset($_SESSION['CarSearchErr'])) echo Session::get('CarSearchErr');
                    else echo ''; ?>
                </small>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Tags</th>
                            <th class="text-center" scope="col">Desciption</th>
                            <th class="text-center" style="width: 15%;"  colspan="3">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data->fetch_all() as $key => $value) {
                        ?>
                            <tr class=<?php if ($value['5'] == true) echo ' "tr-color" ';
                                        else echo '""'; ?>>
                                <td class="text-center"><?= $value['1'] ?></td>
                                <td class="text-center"><?= $value['2'] ?></td>
                                <td><?= $value['3'] ?></td>
                                <td class="text-center" title="ACtive"><a href="./index.php?c=category&a=editStatus&id=<?= $value['0'] ?>&status=<?= $value['5'] ?>"><?= ($value['5'] == 0 ) ? '<i class="fas fa-unlock"></i>' : '<i class="fas fa-lock"></i>' ; ?></a></td>
                                <td class="text-center" title="Update"><a href="./index.php?c=category&a=edit&id=<?= $value['0'] ?>"><i class="fas fa-tools"></i></a></td>
                                <td class="text-center" title="Delete"><a href="./index.php?c=category&a=delCat&id=<?= $value['0'] ?>"><i class="far fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Paging -->
                <nav aria-label="Page navigation" class="d-flex justify-content-end">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?c=category&a=getAll&pageno=1">First</a></li>
                        <?php
                        if (isset($_GET['a']) && $_GET['a'] === 'search') {
                            echo '<li class="page-item"><a class="page-link" href="#">1</a></li> ';
                        } else {
                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="index.php?c=category&a=getAll&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php }
                        } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=category&a=getAll&pageno=<?= $total_pages; ?>">Last</a></li>
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