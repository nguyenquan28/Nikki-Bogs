<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top d-flex p-2">

            <!-- Logo -->
            <a class="logo pb-2 pt-2" href="../index.php">

                <img src="../img/core-img/logo.png" alt="" class="offset-3">
            </a>


            <div class="collapse navbar-collapse d-flex justify-content-end" id="basicExampleNav">

                

                <!-- Notification -->
                <ul class="navbar-nav nav-flex-icons pr-5">
                    <li class="nav-item avatar">
                        <img src="../img/avt-user/<?= Session::get('avatar') ?>">
                        <small style="color: #a8c5de">
                            <a href="../index.php?c=profile&a=profileController">Administrator</a>
                        </small>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php?c=user&a=logout" class="nav-link noti-icon" title="LogOut">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
                <div class></div>
            </div>

            <!-- Collapsible content -->
        </nav>