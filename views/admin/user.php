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
                <header class="mt-3 mb-3"><h4>List User</h4></header>
                <table class="table table-bordered">
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
                            <tr class = <?php if($value['6'] == true) echo ' "tr-color" '; else echo '""';?>>
                                <th class="text-center" ><?= $value['0'] ?></th>
                                <th class="text-center"><?= $value['1'] ?></th>
                                <th class="text-center" ><?= $value['2'] ?></th>
                                <th class="text-center" ><?php if($value['4']) echo 'Man'; else echo 'Woman'; ?></th>
                                <th class="text-center" ><?= date('d-M-Y', strtotime($value['5'])) ?></th>
                                <td class="text-center" title="Cập nhật"><a href="./index.php?c=user&a=editStatus&id=<?= $value['0'] ?>&status=<?= $value['6']?>"><i class="fas fa-tools"></i></a></td>
                                <td class="text-center" title="Xóa"><a href="./index.php?c=user&a=delUser&id=<?= $value['0'] ?>"><i class="far fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    require __DIR__.'/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>