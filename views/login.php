<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/ins/head.php';
require_once __DIR__ . '/../config/session.php';
Session::init();
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
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area mb-100">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class=" col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4 class=" d-flex justify-content-center">Login</h4>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="index.php?c=user&a=login" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" placeholder="Password">
                                </div>
                                <small class="text-danger font-italic d-flex justify-content-end mb-3">
                                    <?php if(isset($_SESSION['loginError'])) echo Session::get('loginError'); else echo ''; ?>
                                </small>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn nikki-btn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php

    # Footer Area
    require_once __DIR__ . '/ins/footer.php';

    # All Javascript Script
    require_once __DIR__ . '/ins/script.php';
    ?>

</body>

</html>