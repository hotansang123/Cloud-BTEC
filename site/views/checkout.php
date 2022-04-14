
        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner pt--80 pt-md--60 pb--72 pb-md--60">
                <div class="container">
                <form action="?act=savebill" method="post" class="form form--checkout">
                    <div class="row">
                       
                        <!-- Checkout Area Start -->  
                        <div class="col-lg-6">
                            <div class="checkout-title mt--10">
                                <h2>Thanh Toán</h2>
                            </div>
                            <div class="checkout-form">
                               
                                    <div class="form-row mb--20">
                                        <div class="form__group col-md-6 mb-sm--30">
                                            <label for="billing_fname" class="form__label">Họ Và Tên<span class="required">*</span></label>
                                            <input type="text" name="name" id="billing_fname" class="form__input">
                                        </div>
                                        <div class="form__group col-md-6">
                                            <label for="billing_lname" class="form__label">Email <span class="required">*</span></label>
                                            <input type="email" name="email" id="billing_lname" class="form__input">
                                        </div>
                                    </div>
                                    <div class="form-row mb--20">
                                        <div class="form__group col-12">
                                            <label for="billing_phone" class="form__label">Điện Thoại <span class="required">*</span></label>
                                            <input type="number" name="phone" id="billing_phone" class="form__input">
                                        </div>
                                    </div>
                                    <div class="form-row mb--20">
                                        <div class="form__group col-12">
                                            <label for="billing_phone" class="form__label">Địa Chỉ<span class="required">*</span></label>
                                            <input type="text" name="address" id="billing_phone" class="form__input">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form__group col-12">
                                            <label for="orderNotes" class="form__label">Ghi Chú</label>
                                            <textarea class="form__input form__input--textarea" id="orderNotes" name="note" placeholder="Ghi chú của bạn, vd: giao cho bác bảo vệ"></textarea>
                                        </div>
                                    </div>
                              
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                            <div class="order-details">
                                <div class="checkout-title mt--10">
                                    <h2>Hoá Đơn</h2>
                                </div>
                                <div class="table-content table-responsive mb--30">
                                    <table class="table order-table order-table-2">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th class="text-right">Tổng Cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $subTotal = 0;
                                               $shipping = 30000;
                                                foreach ($_SESSION['giohang'] as $row) {
                                                   echo ' <tr>
                                                            <th>'.$row['TenDT'].'
                                                                <strong><span>&#10005;</span>'.$row['Amount'].'</strong>
                                                            </th>
                                                            <td class="text-right">'.$this->lib->forMatTien($row['Gia']).' đ</td>
                                                        </tr>';
                                                        $subTotal += $row['Gia']*$row['Amount'];
                                                }
                                            ?>
                                           
                                        </tbody>
                                        <tfoot>
                                            <?php if(isset($_SESSION['discount'])){
                                                 $discountPercent = $_SESSION['discount']['persent'];
                                                ?>
                                            <tr class="cart-subtotal">
                                                <th>Giảm Giá</th>
                                                <td class="text-right"><?=$discountPercent?> %</td>
                                            </tr>
                                            <?php }?>
                                            <tr class="cart-subtotal">
                                                <th>Tổng Tiền</th>
                                                <td class="text-right"><?=$this->lib->forMatTien($subTotal)?> đ</td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Phí Ship</th>
                                                <td class="text-right">
                                                    <span><?=$this->lib->forMatTien($shipping)?> đ</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng Tiền</th>
                                                <td class="text-right"><span class="order-total-ammount"><?=$this->lib->forMatTien(($subTotal+$shipping)-($subTotal/100*$discountPercent))?> đ</span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            
                                    <div class="form form--checkout">
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="bank" name="payment-method" id="bank" checked>
                                                <label class="payment-label" for="bank">Chuyển khoản trực tiếp</label>
                                            </div>
                                            <div class="payment-info" data-method="bank">
                                                <p>Vui lòng chuyển khoản qua stk: 0233 2033 2113 . Tên tài khoản: TRAN QUANG NHAN . ngân hàng: SACOMBANK. Chi nhánh: Tp.HCM</p>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="cod" name="payment-method" id="cheque">
                                                <label class="payment-label" for="cheque">
                                                    Trả tiền sau khi nhận hàng
                                                </label>
                                            </div>
                                            <div class="payment-info cheque hide-in-default" data-method="cheque">
                                                <p>Trả tiền sau khi kiểm tra hàng và nhận hàng thành công.</p>
                                            </div>
                                        </div>
                                        <div class="payment-group mb--10">
                                            <div class="payment-radio">
                                                <input type="radio" value="vnpay" name="payment-method" id="cash">
                                                <label class="payment-label" for="cash">
                                                    Thanh toán qua VNPAY
                                                </label>
                                            </div>
                                            <div class="payment-info cash hide-in-default" data-method="cash">
                                                
                                                <p>Thanh toán trực tuyến qua VNPAY</p>
                                            </div>
                                        </div>
                                        <div class="payment-group mt--20">
                                            <button type="submit" class="btn btn-size-md btn-fullwidth">Thanh Toán</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <!-- Checkout Area End -->
                    
                      
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->
