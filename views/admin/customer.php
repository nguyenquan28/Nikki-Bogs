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
                <header class="mt-3 mb-3"><h3>Customer</h3></header>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col-1">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Status</th>
                            <th colspan="2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data->fetch_all() as $key => $value) {
                        ?>
                            <tr>
                                <th><?= $value['0'] ?></th>
                                <th><?= $value['2'] ?></th>
                                <th><?= $value['1'] ?></th>
                                <th><?= $value['4'] ?></th>
                                <th><select class="form-control-sm" name="status">
                                        <option <?php if($value['6'] == true) { ?> selected <?php } ?>  value="1">Hoạt động</option>
                                        <option <?php if($value['6'] != true) { ?> selected <?php } ?>  value="2">Chặn</option>
                                    </select>
                                </th>
                                <td class="text-center" title="Cập nhật"><a href="./index.php?c=admin&a=change&id=<?= $value['0'] ?>&status=<?= $value['6']?>"><i class="fas fa-tools"></i></a></td>
                                <td class="text-center" title="Xóa"><a href="./index.php?c=admin&a=delete&id=<?= $value['0'] ?>"><i class="far fa-trash-alt text-danger"></i></a></td>
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