<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Nhà Sản Xuất</h4>
                                    <p class="text-muted font-14 mb-3">
                                    Đây là nhà sản xuất.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Giờ Đặt</th>
                                        <th>Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Ghi Chú</th>
                                        <th>Ẩn Hiện</th>
                                        
                                        <th>Xoá</th>
                                        <th>Sửa</th>
                                        <th>Chi Tiết</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $stt = 0;
                                            foreach ($getAllBill as $row) {
                                                $stt++;
                                                $anHien = ($row['AnHien']=='1') ? '<input type="radio" checked onclick="return false">': '<input  type="radio" onclick="return false">';
                                                
                                                $linkDel = "'?ctrl=donhang&act=delete&id=".$row['idDH']."'";
                                                $linkEdit = '?ctrl=donhang&act=edit&id='.$row['idDH'];
                                                $linkDetail = '?ctrl=donhang&act=detail&id='.$row['idDH'];
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td>'.$row['TenNguoiNhan'].'</td>
                                                        <td>'.$row['ThoiDiemDatHang'].'</td>
                                                        <td>'.$row['dienthoai'].'</td>
                                                        <td>'.$row['DiaChiNguoiNhan'].'</td>
                                                        <td>'.$row['GhiChuCuaKhach'].'</td>
                                                        <td>'.$anHien.'</td>
                                                        <td><div  onclick="checkDelete('.$linkDel.')"  class="btn btn-danger" role="button"><i class="fa fa-trash"></i></div></td>
                                                        <td><a name="" id="" class="btn btn-primary" href="'.$linkEdit.'" role="button"><i class="fa fa-edit"></i></a></td>
                                                        <td><a name="" id="" class="btn btn-success" href="'.$linkDetail.'" role="button"><i class="fa fa-bookmark"></i></a></td>    
                                                    </tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    