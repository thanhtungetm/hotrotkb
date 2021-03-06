<?php require_once "./mvc/views/layout/header.php";?>




<div class="container-fluid">
    <!-- <link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet"> -->

    <!-- <div class="nav-side-menu">
        <div class="brand">Brand Logo</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt fa-lg"></i> Dashboard
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#products" class="collapsed active">
                    <a href="#"><i class="fab fa-studiovinari fa-lg"></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fab fa-fort-awesome-alt fa-lg"></i> Services <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>New Service 1</li>
                    <li>New Service 2</li>
                    <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fab fa-pagelines fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>New New 1</li>
                    <li>New New 2</li>
                    <li>New New 3</li>
                </ul>


                <li>
                    <a href="#">
                        <i class="fas fa-user-tie fa-lg"></i> Profile
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-users fa-lg"></i> Users
                    </a>
                </li>
            </ul>
        </div>
    </div> -->


    <div class="row">
        <!-- NAV -->
        <div class="col-12 col-md-2" style="padding-left:0">
            <div class="nav-side-menu">
                <div class="brand">NoName System</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                <div class="menu-list">

                    <ul id="menu-content" class="menu-content collapse out">
                        <li>
                            <a href="./home">
                                <i class="fas fa-tachometer-alt fa-lg"></i> Trang ch???
                            </a>
                        </li>

                        <li data-toggle="collapse" data-target="#products" class="collapsed active">
                            <a href="#"><i class="fab fa-studiovinari fa-lg"></i> Th???i kh??a bi???u <span
                                    class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse show" id="products">
                            <li class="active"><a href="#">K??? ho???ch h???c t???p</a></li>
                            <li><a href="./tkb">S???p  th???i kh??a bi???u</a></li>
                            <li><a href="./dkynhanh">????ng k?? h???c ph???n nhanh</a></li>
                        </ul>
                        <li>
                            <a href="#">
                                <i class="fas fa-user-tie fa-lg"></i> T??i kho???n
                            </a>
                        </li>
                        <li>
                            <a href="./logout">
                                <i class="fas fa-sign-out-alt"></i> ????ng xu???t
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END ---NAV -->

        <!-- Tim h???c ph???n -->
        <div class="col-12 col-md-5">
            <h2 style="text-align:center">T??m h???c ph???n</h2>
            <form action="" method="post">
                <div class="input-group">
                    <input type="search" name="mahp" class="form-control rounded" placeholder="Nhap ma hoc phan"
                        aria-label="Search" aria-describedby="search-addon" required />
                    <button type="submit" class="btn btn-outline-primary">search</button>
                </div>
            </form>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">M?? h???c ph???n</th>
                        <th scope="col">T??n h???c ph???n</th>
                        <th scope="col">Ch???n</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Show h???c ph???n t??m ???????c -->
                    <tr> <?php if(isset($data['kq']) && !empty($data['kq'])){?>
                        <th scope="row">1</th>
                        <td style="color:#b020c3 "><?php echo $data['kq'][0]['mahp'];?></td>
                        <th style="color:#b020c3 "><?php echo $data['kq'][0]['tenhp']; ?></th>
                        <td>
                            <!-- Th??m h???c ph???n v??o k??? ho???ch -->
                            <form action="" method="post">
                                <input type="text" name="mahpThemKH" hidden
                                    value="<?php echo $data['kq'][0]['mahp'];?>">
                                <input class="btn btn-primary btn-sm" type="submit" value="Th??m">
                            </form>
                            <!-- END ---Th??m h???c ph???n v??o k??? ho???ch -->
                        </td>
                        <?php }else echo "<span style='color:red'><b>Kh??ng t??m th???y</b></span>"; ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END ---T??m h???c ph???n -->

        <!-- K??? ho???ch h???c t???p -->
        <div class="col-12 col-md-5">
            <h2 style="text-align:center">K??? ho???ch h???c t???p</h2>
            <h4>ID:<?php echo $data['id'];?></h4>
            <!-- Danh s??ch h???c ph???n -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>M?? HP</th>
                        <th>T??n h???c ph???n</th>
                        <th>X??a</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                  foreach($data['kh'] as $key => $value){
                 ?>
                    <tr>
                        <th><?php echo $key+1 ?></th>
                        <td><?php echo $value['mahp'] ?></td>
                        <td><?php echo $value['tenhp']?></td>
                        <td>
                            <form action="" method="post">
                                <input type="text" name="mahpXoaKH" hidden value="<?php echo $value['mahp'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">X??a</button>
                            </form>
                        </td>
                    </tr>
                    <?php }
                ?>

                </tbody>
            </table>
        </div>
        <!-- END ---K??? ho???ch h???c t???p -->
    </div>

</div>



<?php require_once "./mvc/views/layout/footer.php";?>