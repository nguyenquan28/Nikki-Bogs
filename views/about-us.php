<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../config/session.php';
Session::init();
require_once __DIR__ . '/ins/head.php';
?>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php
    require_once __DIR__ . '/ins/menu.php';
    ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <div class="about-us-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>About Us</h2>
                            <p>Welcome to the Nikki Blog</p>
                        </div>

                        <img src="img/blog-img/7.jpg" alt="">

                        <div class="about-text">
                            <h4>Who We Are</h4>
                            <p><strong>Nikki Blog</strong> provides expert-created, real-world technology content for more than 10 million users like you every month. We have more than 50 technology professionals — software developers, educators, web designers, speakers, consultants, and more — all producing articles with informative visuals and straightforward instruction. Our library of more than 17,000 pieces of content, created and refined over the past 20 years, helps you fix tech gadgets that aren’t working properly, learn how to perform specific tasks, and find the best products — without the confusing jargon you’ll find on other sites. Lifewire is a top-10 technology information site, according to comScore, a leading Internet measurement company, and has been honored with multiple Communicator Awards in the last year.</p>
                            <hr>
                            <h4>Our Writers</h4>
                            <p>Our writers have extensive experience working with the tech they write about. They are leaders in the field — hosting talks, creating technology videos or podcasts, developing apps and software, or teaching online/in-person classes about their subjects — and the majority of our writers hold advanced degrees. Most importantly, these are real people who use the technology they write about, and are passionate about sharing that knowledge and expertise with others.</p>
                            <blockquote>
                                <div class="blockquote-icon">
                                    <img src="img/core-img/quote.png" alt="">
                                </div>
                                <div class="blockquote-text">
                                    <h5>“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods, and the nights will flame with fire.”</h5>
                                </div>
                            </blockquote>
                            <hr>
                            <h3>Editorial Guidelines</h3>
                            <p>We take great pride in the quality of our content. While we cover hundreds of different topics, they all have one thing in common: readers looking for tech information they can trust. Our writers create high-quality, original, accurate, expert content that is free of ethical concerns, conflicts, or misinformation. If you ever come across an article you think needs to be improved, please email us at feedback@lifewire.com and let us know.</p>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <img src="img/blog-img/2.jpg" alt="">
                            </div>
                            <div class="col-12 col-md-4">
                                <img src="img/blog-img/3.jpg" alt="">
                            </div>
                            <div class="col-12 col-md-4">
                                <img src="img/blog-img/4.jpg" alt="">
                            </div>
                        </div>

                        <div class="about-text">
                            <h4>What Our Readers Say</h4>
                            <div class="p-3 mb-4">
                                <p>I tried to power on my laptop and there was no sign of power. Today is an important day because I have many deadlines that I have to meet by midnight. I am incredibly grateful to your instructions on how to turn on a computer that is not powering on. Thank you very much for writing an article about this. You saved me much grief, time, and further pain.</p>
                                <span>-Naz, March 2019</span>
                            </div>
                            <div class="p-3 mb-4">
                                <p>Thank you so so much for the advice on this web site. Now I can truly listen to Spotify with happiness and the sound is out of this world. You guys are pretty smart. I've been having problems with Bluetooth through my cell for weeks and weeks and now the audio sounds great for Spotify on my Kenwood stereo. Thank you truly from the bottom of my heart. Have a great evening!</p>
                                <span>-Charlene, February 2019</span>
                            </div>
                            <div class="p-3 mb-4">
                                <p>I spent three hours trying to create an html signature for Thunderbird and then I found your site! It took me 5 minutes… simple! Thanks for the very clear instructions, unlike so MANY tech sites. I'll be back! Have a great day!</p>
                                <span>-Phil, February 2019</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #### Start ##### -->
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