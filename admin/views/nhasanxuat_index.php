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
                                        <th>Tên Nhà Sản Xuất</th>
                                        <th>Thứ Tự</th>
                                        <th>Ẩn Hiện</th>
                                        <th>Xoá</th>
                                        <th>Sửa</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $stt = 0;
                                            foreach ($list as $row) {
                                                $stt++;
                                                $anHien = ($row['AnHien']=='1') ? '<input type="radio" checked onclick="return false">': '<input  type="radio" onclick="return false">';
                                                
                                                $linkDel = "'?ctrl=nhasanxuat&act=delete&id=".$row['idNSX']."'";
                                                $linkEdit = '?ctrl=nhasanxuat&act=edit&id='.$row['idNSX'];
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td>'.$row['TenNSX'].'</td>
                                                        <td>'.$row['ThuTu'].'</td>
                                                        <td>'.$anHien.'</td>
                                                        <td><div  onclick="checkDelete('.$linkDel.')"  class="btn btn-danger" role="button"><i class="fa fa-trash"></i></div></td>
                                                        <td><a><a name="" id="" class="btn btn-primary" href="'.$linkEdit.'" role="button"><i class="fa fa-edit"></i></a></a></a></td>
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
    