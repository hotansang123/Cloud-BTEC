
        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner ptb--80 ptb-md--60">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-5">
                        <div class="table-content table-responsive">
                                <table class="table table-style-2 wishlist-table text-left">
                                  
                                    <tbody>
                                       <tr class="text-left">
                                            <td>Tên người nhận: </td>
                                            <td><?= $getInfoBill['TenNguoiNhan']?></td>
                                       </tr>
                                       <tr>
                                            <td>Email người nhận:</td>
                                            <td><?= $getInfoBill['EmailNguoiNhan']?></td>
                                       </tr>
                                       <tr>
                                            <td>Điện thoại người nhận:</td>
                                            <td><?= $getInfoBill['dienthoai']?></td>
                                       </tr>
                                       <tr>
                                            <td>Địa chỉ: </td>
                                            <td><?= $getInfoBill['dienthoai']?></td>
                                       </tr>
                                       <tr>
                                            <td>Ghi chú: </td>
                                            <td><?= $getInfoBill['GhiChuCuaKhach']?></td>
                                       </tr>
                                       <tr>
                                            <td>Trạng thái</td>
                                            <td><?= ($getInfoBill['TrangThai']==0)? 'Mới Đặt':'Đang Giao Hàng' ?></td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                        <div class="col-7">
                            <div class="table-content table-responsive">
                                <table class="table table-style-2 wishlist-table text-center">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($getProductFromIdBill as $row) {
                                                if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                                    $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                                }else{
                                                    $img = PATH_IMG_SITE.'logo.png';
                                                }
                                                echo '<tr>
                                                <td class="product-thumbnail text-left">
                                                    <img width="80" height="80" src="'.$img.'" alt="Product Thumnail">
                                                </td>
                                                <td class="product-name">
                                                    <h3>
                                                        <a href="product-details.html">'.$row['TenDT'].'</a>
                                                    </h3>
                                                </td>
                                                
                                                <td class="product-price">
                                                    <span class="product-price-wrapper">
                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' đ</span>
                                                    </span>
                                                </td>
                                            </tr>';
                                            }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->