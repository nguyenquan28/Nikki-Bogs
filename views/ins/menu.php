<header class="header-area">
    <!-- Navbar Area -->
    <div class="nikki-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="nikkiNav">

                    <!-- Nav brand -->
                    <a href="home.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="archive-blog.php">Archive Blog</a></li>
                                <li><a href="#">Catagories</a>
                                    <ul class="dropdown">
                                        <li><a href="home.php">Fashion</a></li>
                                        <li><a href="archive-blog.php">Archive Blog</a></li>
                                        <li><a href="single-post.php">Single Post</a></li>
                                        <li><a href="about-us.php">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="typography.php">Typography</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Search Form -->

                            <div class="search-form">
                                <form action="index.php?c=comment&a=addcomment" method="post">
                                    <input type="search" name="search" class="form-control" placeholder="Search and hit enter...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                            <!-- Social Button -->
                            <div class="top-social-info">
                                <?php
                                // echo Session::get('name');
                                if (empty(Session::get('name'))) {
                                    echo '<a href="login.php">Login</a>';
                                } else {
                                    if (Session::get('permission')) {
                                        // header('location: admin/index.php');
                                        echo '<a href="admin/index.php">'
                                            . Session::get('name') . '</a>'
                                            . '<a href="index.php?c=user&a=logout" class="nav-link noti-icon" title="LogOut">
                                                <i class="fa fa-sign-out"></i>
                                            </a>';
                                    } else {
                                        echo '<a href="index.php?c=profile&a=profileController">'
                                            . Session::get('name') . '</a>'
                                            . '<a href="index.php?c=user&a=logout" class="nav-link noti-icon" title="LogOut">
                                            <i class="fa fa-sign-out"></i>
                                        </a>';
                                    }
                                }
                                ?>

                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>