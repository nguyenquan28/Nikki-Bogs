<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/ins/head.php';
?>

<body>
    <?php
    # Header Area Start
    require_once __DIR__ . '/ins/menu.php';
    ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class=" col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4 class=" d-flex justify-content-center">Register</h4>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date" id="example-date-input" placeholder="Birthday">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Re-password">
                                </div>
                                <div class="text-warning">
                                    <label for="">By creating an account, you agree to Nikki's <a href="#">Conditions of Use</a> and <a href="#">Privacy Notice</a>.</label>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" class="btn nikki-btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php
    # Instagram Area
    require_once __DIR__ . '/ins/instargam.php';

    # Footer Area
    require_once __DIR__ . '/ins/footer.php';

    # All Javascript Script
    require_once __DIR__ . '/ins/script.php';
    ?>

</body>

</html>