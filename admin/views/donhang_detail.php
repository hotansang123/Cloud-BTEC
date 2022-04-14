<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-7">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Nhà Sản Xuất</h4>
                                    <p class="text-muted font-14 mb-3">
                                    Đây là nhà sản xuất.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>STT</th>
                                        <th>Ảnh </th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $stt = 0;
                                            foreach ($getProDetail as $row) {
                                                $stt++;
                                                $anHien = ($row['AnHien']=='1') ? '<input type="radio" checked onclick="return false">': '<input  type="radio" onclick="return false">';
                                                if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                                    $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                                }else{
                                                    $img = PATH_IMG_SITE.'logo.png';
                                                }
                                          
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td><img width="50" height="50" src="'.$img.'"></td>
                                                        <td>'.$row['TenDT'].'</td>
                                                        <td>'.$row['Gia'].'</td>
                                                        <td>'.$row['SoLuong'].'</td>
                                                    </tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <table>
                                    <tr>
                                        <td>Tên:  </td>
                                        <td><strong><?= $getInfoDetail['TenNguoiNhan']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><strong><?= $getInfoDetail['EmailNguoiNhan']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Điện Thoại: </td>
                                        <td><strong><?= $getInfoDetail['dienthoai']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Địa Chỉ: </td>
                                        <td><strong><?= $getInfoDetail['DiaChiNguoiNhan']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ghi Chú Của Khách: </td>
                                        <td><strong><?= $getInfoDetail['GhiChuCuaKhach']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ghi Chú Của Admin: </td>
                                        <td><strong><?= $getInfoDetail['GhiChuCuaAdmin']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng Thái: </td>
                                        <td><strong><?= ($getInfoDetail['TrangThai']==0) ? 'Mới Đặt':'Đang Xử Lý' ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Thời Điểm Đặt Hàng: </td>
                                        <td><strong><?= $getInfoDetail['ThoiDiemDatHang']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Thời Điểm Giao Hàng: </td>
                                        <td><strong><?= $getInfoDetail['ThoiDiemGiaoHang']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ẩn Hiện: </td>
                                        <td><strong><?= ($getInfoDetail['AnHien'] =='1') ? 'Hiện' : 'Ẩn'?></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-2">
                                <a name="" id="" class="btn btn-danger" href="#" role="button">Huỷ</a>
                                <a name="" id="" class="btn btn-primary" href="?ctrl=donhang&act=edit&id=<?=$_GET['id']?>" role="button">Sửa</a>
                            </div>
                        </div>
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    