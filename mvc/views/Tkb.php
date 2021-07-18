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
                        <li>
                            <a href="./home">
                                <i class="fas fa-tachometer-alt fa-lg"></i> Trang chủ
                            </a>
                        </li>

                        <li data-toggle="collapse" data-target="#products" class="collapsed active">
                            <a href="#"><i class="fab fa-studiovinari fa-lg"></i> Thời khóa biểu <span
                                    class="arrow"></span></a>
                        </li>
                        <ul class="sub-menu collapse show" id="products">
                            <li><a href="./dkkehoach">Kế hoạch học tập</a></li>
                            <li class="active"><a href="#">Sắp thời khóa biểu</a></li>
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
        <div class="col-12 col-md-6" >
          <h2 style="text-align:center">Thời khóa biểu</h2>
         
          <table class="table table-bordered"  id="tkb" >
              <thead>
                  <tr style="background-color:#9dead6">
                      <th style="text-align:center">#</th>
                      <th style="text-align:center">Thứ 2</th>
                      <th style="text-align:center">Thứ 3</th>
                      <th style="text-align:center">Thứ 4</th>
                      <th style="text-align:center">Thứ 5</th>
                      <th style="text-align:center">Thứ 6</th>
                      <th style="text-align:center">Thứ 7</th>
                  </tr>
              </thead>
              <tbody>
                  <?php for($i=1; $i<=9; $i++){
              echo "<tr>";
              for($j=1;$j<=7;$j++){
                if($j==1){
                  echo "<th style='text-align:center;background-color:#9dead6'>".$i."</th>";
                }else{
                  echo "<td></td>";
                }
                
              }
              echo "</tr>";
            } ?>

              </tbody>
          </table>
          <button type="button" class="btn btn-success" id="sapTkb" onclick="sapTKB()">Sắp TKB</button>
          <button type="button" class="btn btn-primary" id="luuTkb" onclick="luuTKB()" disabled>Lưu TKB</button>
          <button type="button" class="btn btn-primary" id="loadTkb" onclick="loadTKB()" >TKB đã lưu</button>
          <div id="ketqua"></div>
        </div>
        <!-- END ---Thời khóa biểu -->

        <!-- Kế hoạch học tập -->
        <div class="col-12 col-md-4">
            <h2 style="text-align:center">Kế hoạch học tập</h2>
            <!-- Danh sách học phần -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã HP</th>
                        <th>Tên học phần</th>
                        <th>Nhóm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($data['ds'] as $key => $value){
                    ?>
                    <tr>
                        <th><?php echo $key+1; ?></th>
                        <td class="dsHP"><?php echo $value['mahp']; ?></td>
                        <td><?php echo $value['tenhp'];?></td>
                        <td>
                            <form action="" method="post">
                              <select style="color:green" class="dsNhom" onchange="thayDoiNhom(value,'<?php echo $value['mahp'];?>')">
                                <option value="Auto">Auto</option>
                                <option checked value="No" style="color:red">No</option>
                                <?php 
                                  foreach($value['dsNhom'] as $k=>$v){
                                    echo "<option style='color:black' value='".$v['kyhieu']."'>".$v['kyhieu']."</option>";
                                  }
                                ?>
                              </select>
                      
                                <!-- <button type="submit" class="btn btn-danger btn-sm">Xóa</button> -->
                            </form>
                        </td>
                    </tr>
                    <?php }

                    // echo "<pre>";
                    // var_dump($data['ds']);
                    // echo "</pre>";
                    ?>
                </tbody>
            </table>
            <h2 style="text-align:center">Kết quả</h2>
            <!-- Danh sách học phần -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã HP</th>
                        <th>Tên học phần</th>
                        <th>Nhóm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($data['ds'] as $key => $value){
                    ?>
                    <tr>
                        <th><?php echo $key+1; ?></th>
                        <td><?php echo $value['mahp']; ?></td>
                        <td><?php echo $value['tenhp'];?></td>
                        <th style="text-align:center; color:blue;" class="dsKQ" id="<?php echo $value['mahp']; ?>">Auto</th>
                    </tr>
                    <?php }

                    // echo "<pre>";
                    // var_dump($data['ds']);
                    // echo "</pre>";
                    ?>
                </tbody>
            </table>

        </div>
        <!-- END ---Kế hoạch học tập -->
        



    </div>
</div>







<?php require_once "./mvc/views/layout/footer.php";?>