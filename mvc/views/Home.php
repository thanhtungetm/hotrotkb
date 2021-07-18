<?php require_once "./mvc/views/layout/header.php";?>


<div class="container-fluid">
    <div class="row">
        <!-- NAV -->
        <div class="col-12 col-md-2" style="padding-left:0">
            <div class="nav-side-menu">
                <div class="brand">NoName System</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                <div class="menu-list">

                    <ul id="menu-content" class="menu-content collapse out">
                        <li class="active">
                            <a href="#">
                                <i class="fas fa-tachometer-alt fa-lg"></i> Trang chủ
                            </a>
                        </li>

                        <li data-toggle="collapse" data-target="#products" class="collapsed">
                            <a href="#"><i class="fab fa-studiovinari fa-lg"></i> Thời khóa biểu <span
                                    class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse" id="products">
                            <li><a href="./dkkehoach">Kế hoạch học tập</a></li>
                            <li><a href="./tkb">Sắp thời khóa biểu</a></li>
                            <li><a href="./dkynhanh">Đăng ký học phần nhanh</a></li>
                        </ul>

                        <li>
                            <a href="#">
                                <i class="fas fa-user-tie fa-lg"></i> Tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="./logout">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- END ---NAV -->

        <!-- Thời khóa biểu -->
        <div class="col-12 col-md-10">
            <h2>Welcome, <?php echo $data['name']?></h2>
        </div>
        



    </div>
</div>







<?php require_once "./mvc/views/layout/footer.php";?>