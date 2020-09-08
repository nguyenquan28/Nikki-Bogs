<?php
require_once __DIR__ . '../../../config/session.php';
Session::init();
require_once __DIR__ . '../../../model/user.php';
$user = new userModel();
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
                <header class="mt-3 mb-3 d-flex justify-content-between">
                    <h4></h4>
                    <a href="index.php?c=contact"><button type="button" class="btn btn-outline-danger">Back</button></a>
                </header>

                <section class="contact-area">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 col-lg-6">
                                <div class="contact-content mb-100">
                                    <div class="header-contact d-flex justify-content-start">
                                        <div class="avatar-contact">
                                            <img src=<?= (empty($result['avatar'])) ? "https://ptetutorials.com/images/user-profile.png" : "../img/" . $result['avatar'] ?> alt="">
                                        </div>
                                        <div class="info-contact pl-3">
                                            <div class="single-contact-info ">
                                                <h5><?= ucwords($result['fullname']); ?></h5>
                                            </div>

                                            <div class="single-contact-info d-flex justify-content-start">
                                                <p>< </p>
                                                <p><?= $result['email'] ?></p>
                                                <p> ></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-contact-info mt-3  pl-2">
                                        <h4 class="message-contact"><?= $result['content'] ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="contact-content mb-100">
                                    <h4>SEND EMAIL</h4>

                                    <!-- Contact Form Area -->
                                    <div class="contact-form-area">
                                        <form action="mailer/phpmailer.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="email" id="contact-name" placeholder="Name" value="<?= $result['email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="contact-name" placeholder="Name" value="I'm Admin">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" id="contact-phone" placeholder="Title" value="Nikki Blogs">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" style="height: 220px;" name="message" id="message" rows="50" cols="50" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn nikki-btn mt-10">Reply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/ins-admin/scriptAdmin.php';
    ?>
</body>

</html>