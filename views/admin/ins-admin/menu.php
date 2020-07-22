<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top d-flex p-2">

            <!-- Logo -->
            <a class="logo pb-2 pt-2" href="#">
                <img src="../img/logo.png" alt="" class="offset-3">
            </a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Search -->
                <form class="form-outline col-md-5 ">
                    <div class="md-form my-0">
                        <div>
                            <input class="form-control mr-sm-2 d-flex flex-row bg-light" type="text" placeholder="Search for Name" aria-label="Search">
                        </div>

                        <div class="search_btn d-flex flex-row">
                            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                </form>

                <!-- Notification -->
                <ul class="navbar-nav nav-flex-icons offset-3">
                    <li class="nav-item">
                        <a class="nav-link noti-icon">
                            <i class="fa fa-envelope-o mr-2"></i>
                            <span class="number bg-success">+5</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link noti-icon">
                            <i class="fa fa-bell-o mr-2" aria-hidden="true"></i>
                            <span class="number bg-warning">+1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link noti-icon">
                            <i class="fa fa-cogs mr-3" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item avatar  pl-md-4" data-toggle="dropdown">
                        <img src="../img/avt.png" alt="" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        <small style="color: #a8c5de">
                            <a href="../home.php">Administrator</a>
                        </small>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php?c=logout&a=detroy" class="nav-link noti-icon" title="LogOut">
                            <i class="fa fa-sign-out"></i></i>
                        </a>
                    </li>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">
                            <a href="">Trang chủ</a>
                        </button>
                        <button class="dropdown-item" type="button">
                            <a href="#">Đăng xuất</a>
                        </button>
                    </div>
                </ul>

            </div>

            <!-- Collapsible content -->
        </nav>