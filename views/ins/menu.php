<header class="header-area">
    <!-- Navbar Area -->
    <div class="nikki-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="nikkiNav">

                    <!-- Nav brand -->
                    <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

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
                            <ul class="mr-5 pr-5">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="archive-blog.php">Archive Blog</a></li>
                                <!-- <li><a href="#">Catagories</a>
                                    <ul class="dropdown"> -->
                                        <?php
                                            // foreach($listCat as $value){
                                        ?>
                                            <!-- <li><a href="home.php">Fashion</a></li> -->
                                        <?php
                                            // }
                                        ?>
                                    <!-- </ul> -->
                                </li>
                                <li><a href="about-us.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>

                            <!-- Search Form -->

                            <div class="search-form">
                                <form action="index.php?c=home&a=viewArchive&st=1" method="post">

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
                                            .   Session::get('name') . '</a>'
                                            .   '<a id="clickChat" href="#subChat" data-toggle="collapse" aria-expanded="false"  class="nav-link noti-icon" title="Message">
                                                    <i class="fa fa-comment"></i>'
                                                    . Session::get('newMess') . '
                                                </a>'
                                            .   '<a href="index.php?c=user&a=logout" class="nav-link noti-icon" title="LogOut">
                                                    <i class="fa fa-sign-out"></i>
                                                </a>';
                                        // header("location: index.php?c=chat&a=myChat&sender_id=" . Session::get('user_id'));
                                    }
                                }
                                ?>
                            </div>
                            <!-- Nav End -->
                        </div>
                </nav>
            </div>
        </div>

    </div>
    <!-- Chat -->
    <div id='subChat' class="collapse">
        <div class="d-flex justify-content-end">
            <div class="d-flex flex-column chat-content pt-2" id="chat-content">
                <!-- <div class="detail-chat">
                    <div class="receive-mess m-1">
                        <p>hello cậu</p>
                        <span class="time-mess">10-Sep | 10:25 am</span>
                    </div>
                    <div class="send-mess m-1">
                        <p>chào cậu luôn</p>
                        <span class="time-mess">10-Sep | 10:26 am</span>
                    </div>
                </div> -->
                <div>
                    <a href="index.php?c=chat&a=myChat&sender_id=<?= Session::get('user_id') ?>">
                        Admin
                    </a>
                    <hr>
                </div>
                <div class="detail-chat" id="detailChat" style="height: <?= (isset($detail_chat)) ? '40vh' : '-1vh'; ?>">
                    <?php
                    if (isset($detail_chat)) foreach ($detail_chat as $value) {
                    ?>
                        <?= ($value['sender_id'] == Session::get('user_id')) ?
                            '<div class="send-mess m-1">
                            <p>' . $value['message'] . '</p>
                            <span class="time-mess">' . date('d-M | g:i a', strtotime($value['time'])) . '</span>
                        </div>' :
                            '<div class="receive-mess m-1">
                            <p>' . $value['message'] . '</p>
                            <span class="time-mess">' . date('d-M | g:i a', strtotime($value['time'])) . '</span>
                        </div>'; ?>
                    <?php
                    }
                    ?>
                </div>
                <form class="input_msg_write" style="display: <?= (isset($detail_chat)) ? 'block' : 'none'; ?>" action="index.php?c=chat&a=sendAd" method="POST">
                    <input type="text" class="write_msg" name="message" placeholder="Type a message" />
                    <button class="msg_send_btn ml-3" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function gotoBottom(detailChat) {
            var element = document.getElementById(detailChat);
            element.scrollTop = element.scrollHeight - element.clientHeight;
        }
    </script>
</header>