<div id="sidebar-container" class="sidebar-expanded d-none d-md-block">

    <ul class="list-group">

        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small><i class="fas fa-tachometer-alt"></i><strong> Dashboards</strong></small>
        </li>
        <a href="?c=post" class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between">
            <div class="group-name">
                <span class="fas fa-clipboard ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Posts</span>
            </div>
            <span class="item text-warning pd-0 mg-0"><?php if(Session::get('postNew') == 0 ) echo '' ; else echo Session::get('postNew'); ?></span>
        </a>

        <a href="?c=contact" class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between">
            <div class="group-name">
                <span class="fas fa-envelope-open-text ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Contacts</span>
            </div>
            <span class="item text-warning pd-0 mg-0"><?php if(Session::get('conNew') == 0 ) echo '' ; else echo Session::get('conNew'); ?></span>
        </a>

        <a href="?c=user" class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between">
            <div class="group-name">
                <span class="fa fa-user-circle-o ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Users</span>
            </div>
            <span class="item text-warning pd-0 mg-0"><?php if(Session::get('userNew') == 0 ) echo '' ; else echo Session::get('userNew'); ?></span>
        </a>

        <a href="?c=comment" class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between">
            <div class="group-name">
                <span class="fas fa-comments fa-fw ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Report</span>
            </div>
            <span class="item text-warning pd-0 mg-0">1</span>
        </a>

        <a href="?c=category" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="fas fa-tasks fa-fw ml-2 mr-2" aria-hidden="true"></span>
            <span class="menu-collapsed">Categories</span>
        </a>

        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small><strong>Tùy chọn</strong></small>
        </li>

        <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-shopping-cart fa-fw mr-3"></span>
                <span class="menu-collapsed">Bán hàng</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>

        <div id='submenu4' class="collapse sidebar-submenu">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="fa fa-plus-circle ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Bán hàng</span>
            </a>

            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="fa fa-refresh ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Đổi hàng</span>
            </a>

            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="fa fa-user-circle-o ml-2 mr-2" aria-hidden="true"></span>
                <span class="menu-collapsed">Tạo tài khoản</span>
            </a>
        </div>

        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-calendar fa-fw mr-3"></span>
                <span class="menu-collapsed">Kho hàng</span>
            </div>
        </a>

        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-search fa-fw mr-3"></span>
                <span class="menu-collapsed">Tìm kiếm</span>
            </div>
        </a>

        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-envelope-o fa-fw mr-3"></span>
                <span class="menu-collapsed">Messages
                    <!-- <span class="badge badge-pill badge-primary ml-2">5</span> -->
                </span>
            </div>
        </a>

        <li class="list-group-item sidebar-separator menu-collapsed"></li>

        <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mr-3"></span>
            </div>
        </a>
    </ul>
</div>