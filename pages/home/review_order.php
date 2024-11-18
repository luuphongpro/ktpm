<div class="container">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" style="width: 30px; height: 30px; object-fit: cover;" src="./img/pexels-pixabay-60597.jpg" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center"></h3>
                                <a href="index.php?chon&amp;id=home" class="btn btn-danger btn-block" onclick="LogOut()"><b>Logout</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <!-- <li class="nav-item"><a class="nav-link" href="#pending" data-toggle="tab" aria-expanded="false">Order in pending</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab" aria-expanded="true">Order on delivering</a></li> -->
                                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab" aria-expanded="false">My orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false">Profile</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="pending" aria-expanded="false">
                                        <!-- Post -->
                                        <div class="post" style=" text-align: center;">

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="activity" aria-expanded="false">
                                        <!-- Post -->
                                        <div class="post" style=" text-align: center; ">
                                            <span>HAVE NO ORDER</span>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="timeline" aria-expanded="true">
                                        <!-- Post -->
                                        <div class="post" style=" text-align: center; ">
                                            <table class="table list-donhang">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Mã đơn hàng</th>
                                                        <th scope="col">Thời gian đặt hàng</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Tình trạng đơn hàng</th>
                                                        <th scope="col">Xem chi tiết</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="js_data_order">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>1</td>
                                                        <td>2024-03-25 08:16:31</td>
                                                        <td>75000</td>
                                                        <td style="color: blue"> Đã xử lý</td>
                                                        <td>
                                                            <a onclick="showchitiethoadon(1)" class="donhang-detail">
                                                                <i class="fa-solid fa-eye " aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="settings" aria-expanded="false">
                                        <form class="form-horizontal" method="post" id="form-user">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Tên đăng nhập</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="loginname" placeholder="Last Name" value="Admin" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-4 col-form-label">Phone</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" name="phone" readonly="" placeholder="Phone number" value="0123456789" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputExperience" class="col-sm-4 col-form-label">Address</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="address" id="" class="form-control" placeholder="Address" value="25 Ngô Gia Tự" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputSkills" class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" name="password" placeholder="Password" value="Admin@">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-8">
                                                        <input type="submit" class="btn btn-info" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="">
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<script src="./js/review_order.js" defer></script>