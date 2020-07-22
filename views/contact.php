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
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Google Maps Start ##### -->
    <div class="map-area">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.644159044751!2d108.21911381480729!3d16.032028888903902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219ee69b01f1f%3A0x2203e7dc994acd54!2zMzMgWMO0IFZp4bq_dCBOZ2jhu4cgVMSpbmgsIEhvw6AgQ8aw4budbmcgTmFtLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1595230169856!5m2!1svi!2s"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
    <!-- ##### Google Maps End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4>Get In Touch</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum, consectetur adipisicing elit.</p>
                        <!-- Single Contact Info -->
                        <div class="single-contact-info">
                            <h6>Location:</h6>
                            <h4>33 Xo Viet Nghe Tinh, Da nang</h4>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info">
                            <h6>Email:</h6>
                            <h4>nikki.news@gmail.com</h4>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info">
                            <h6>Phone:</h6>
                            <h4>(+123) 456-789-1120</h4>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h4>Contact Form</h4>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn nikki-btn mt-15">Submit</button>
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