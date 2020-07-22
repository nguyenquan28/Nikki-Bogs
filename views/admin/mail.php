<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/ins-admin/head.php';
?>

<body>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?c=contact"><i class="fa fa-home"></i> Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Email</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4>Content</h4>
                        <div class="single-contact-info mb-4">
                            <h6>Name:</h6>
                            <h4><?= $result['fullname'] ?></h4>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info mb-4">
                            <h6>Email:</h6>
                            <h4><?= $result['email'] ?></h4>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info mb-4">
                            <h6>Phone:</h6>
                            <h4><?= $result['phone_number'] ?></h4>
                        </div>
                        <div class="single-contact-info mb-4">
                            <h6>Message:</h6>
                            <h4><?= $result['content'] ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4>SEND EMAIL</h4>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Name" value="I'm Admin">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-phone" placeholder="Title" value="Nikki Blogs">
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

</body>

</html>