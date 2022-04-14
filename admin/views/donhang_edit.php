

<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-10">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Điện Thoại</h4>

                                    <form data-parsley-validate novalidate method="post" enctype="multipart/form-data">
            
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Tên Người Nhận</label>
                                                    <input type="text" name="name"  parsley-trigger="change" required
                                                        placeholder="Nhập tên nhà sản xuất" value="<?=$getBillDetail['TenNguoiNhan']?>" class="form-control" id="userName">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input  type="text" name="email" parsley-trigger="change" required
                                                        placeholder="Nhập giá" value="<?=$getBillDetail['EmailNguoiNhan']?>" class="form-control" id="emailAddress">
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Điện Thoại</label>
                                                    <input  type="number" name="dienthoai" parsley-trigger="change" required
                                                        placeholder="Nhập giảm giá" value="<?=$getBillDetail['dienthoai']?>" class="form-control" id="emailAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Địa Chỉ</label>
                                                    <input type="text" name="diachi" value="<?=$getBillDetail['DiaChiNguoiNhan']?>" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Ghi Chú Của Khách</label>
                                                    <input type="text" name="ghichucuakhach" value="<?=$getBillDetail['GhiChuCuaKhach']?>" class="form-control" >
                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Ghi Chú Của Admin</label>
                                                    <input type="text" name="ghichucuaadmin"  value="<?=$getBillDetail['GhiChuCuaAdmin']?>" class="form-control" >
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Thời Điểm Giao Hàng</label>
                                                    <input name="thoidiemgiaohang" class="form-control" type="datetime-local" value="<?=join("T",explode(" ",$getBillDetail['ThoiDiemGiaoHang']));?>" id="example-datetime-local-input">
                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                                
                                                <div class="form-group">
                                                    <label for="">Thời Điểm Đặt Hàng</label>
                                                    <input name="thoidiemdathang" class="form-control" type="datetime-local" value="<?=join("T",explode(" ",$getBillDetail['ThoiDiemDatHang']));?>" id="example-datetime-local-input">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                           
                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <label for="">Trạng Thái</label>
                                                    <select class="custom-select" name="trangthai" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                                      
                                                        <?php if($getBillDetail['TrangThai'] == '1'){
                                                                echo '<option value="1" selected>Đang Xử Lý</option>
                                                                    <option value="0">Mới Đặt</option>';
                                                        } else{
                                                            echo '<option value="1" >Đang Xử Lý</option>
                                                                <option selected value="0">Mới Đặt</option>';
                                                        }  
                                                        ?>
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-1" type="checkbox" name="anhien" <?=($getBillDetail['AnHien']==1) ? 'checked' : '';?> value="1" data-parsley-multiple="remember-1">
                                                        <label for="remember-1">Ẩn Hiện ? </label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                      

                                        <div class="form-group text-right mb-0 mt-5">
                                            <input type="submit" name="sua" class="btn btn-primary waves-effect waves-light mr-1" value="Sửa">
                                           <a href="?ctrl=donhang&act=index" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>