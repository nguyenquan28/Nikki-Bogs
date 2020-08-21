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
        <div class="row mt-5 pt-1" id="body-row">

            <!-- Side bar -->
            <?php
            require __DIR__.'/ins-admin/sidebar.php';
            ?>

            <div class="col">
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4>List Category</h4>
                    <button type="button" class="btn btn-outline-info"><a href="./index.php?c=category&a=newCat">New Category</a></button>
                </header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Tags</th>
                            <th class="text-center" scope="col">Desciption</th>
                            <th class="text-center" colspan="2">Control</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data->fetch_all() as $key => $value) {
                        ?>
                            <tr class = <?php if($value['5'] == true) echo ' "tr-color" '; else echo '""';?>>
                                <td class="text-center" ><?= $value['0'] ?></td>
                                <td class="text-center"><?= $value['1'] ?></td>
                                <td class="text-center" ><?= $value['2'] ?></td>
                                <td ><?= $value['4']?></td>
                                <td class="text-center" title="Update"><a href="./index.php?c=category&a=editStatus&id=<?= $value['0'] ?>&status=<?= $value['5']?>"><i class="fas fa-tools"></i></a></td>
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
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="index.php?c=category&a=getAll&pageno=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="index.php?c=category&a=getAll&pageno=<?= $total_pages; ?>">Last</a></li>
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